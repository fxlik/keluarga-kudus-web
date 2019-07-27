@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.organisasi')}}">Organisasi</a>
  </li>
  <li class="breadcrumb-item active">Seksi Bidang</li>
</ol>
@endsection

@section('content')
<div class="card mb-3">
    @if (Auth::user()->is_verified == 10 || Auth::user()->is_verified == 11 || Auth::user()->is_verified == 0)
    <div class="card-header">
            <i class="fas fa-exclamation-circle"></i>
            USER TIDAK PUNYA AKSES
        </div>
        <div class="card-body">
          <div class="alert alert-danger">
              <h5><b>ANDA TIDAK PUNYA AKSES KE HALAMAN INI</b></h5>
              Akun anda tidak mempunyai akses pada halaman ini, silakan kembali ke <a href="{{route('pengurus.beranda')}}">Beranda.</a>
          </div>
        </div>
    @else
    <div class="card-header">
        <i class="fas fa-users"></i>
        <b>{{$organisasi->nama}}</b>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="content-group">
                    <h5>Data Seksi & subseksi bidang</h5>
                    <div id="tombolan" style="margin-bottom:10px;">
                        <a id="tambah_lingkungan" class="btn btn-sm btn-success" href="#"><i class="fas fa-plus"></i> Tambah Seksi</a>
                    </div>
                    <div id="batalin" style="margin-bottom:10px; display:none;">
                        <a id="batal_tambah" class="btn btn-sm btn-danger" href="#"><i class="fas fa-times"></i> Batalkan Tambah</a>
                    </div>
                    
                    <div id="form_lingkungan" style="margin-bottom:12px; display:none;">
                        <form action="{{route('pengurus.seksiPost')}}" class="form-horizontal" role="form" data-toggle="validator" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input type="hidden" name="organisasi_id" value="{{$organisasi->id}}">
                          <div class="form-group">
                            <div class="form-label-group">
                              <input id="nama_seksi" type="text" name="nama_seksi" class="form-control" placeholder="Nama Seksi/Subseksi" required>              
                              <label for="nama_seksi">Nama Seksi/Subseksi</label>
                              {{-- <span style="color:cornflowerblue; font-size:13px;"><i>*</i></span><br> --}}
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-label-group">
                              <input id="nama_pj" type="text" name="nama_pj" class="form-control" placeholder="Penanggungjawab (PJ)" required>              
                              <label for="nama_pj">Penanggungjawab (PJ)</label>
                              {{-- <span style="color:cornflowerblue; font-size:13px;"><i>*</i></span><br> --}}
                            </div>
                          </div>
                          <button onclick="return confirm('Simpan Data seksi bidang?')" type="submit" class="btn btn-sm btn-success add" id="simpanBarang">Simpan</button>
                        </form>
                    </div>

                    {{-- buat edit --}}
                    <div id="batale" style="margin-bottom:10px; display:none;">
                        <a id="batal_edit" class="btn btn-md btn-danger" href="#"><i class="fas fa-times"></i> Batalkan Edit</a>
                    </div>
                    <div id="edit_lingkungan" style="margin-bottom:12px; display:none;">
                        <form action="{{route('pengurus.seksiUpdate')}}" class="form-horizontal" role="form" data-toggle="validator" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input type="hidden" name="wilayah_idedit" value="#">
                          <div class="form-group">
                            <div class="form-label-group">
                              <input id="nama_seksiedit" type="text" name="nama_seksiedit" class="form-control" placeholder="Nama Seksi/Subseksi" required>              
                              <label for="nama_seksiedit">Nama Seksi/Subseksi</label>
                              {{-- <span style="color:cornflowerblue; font-size:13px;"><i>*</i></span><br> --}}
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-label-group">
                              <input id="nama_pjedit" type="text" name="nama_pjedit" class="form-control" placeholder="Penanggungjawab (PJ)" required>              
                              <label for="nama_pjedit">Penanggungjawab (PJ)</label>
                            </div>
                          </div>
                          <input type="hidden" name="seksi_id" id="seksi_id">
                          <button onclick="return confirm('Update Data Lingkungan?')" type="submit" class="btn btn-sm btn-success add" id="simpanBarang">Simpan</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Seksi/Subseksi</th>
                                    <th>Penanggungjawab (PJ)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Seksi/Subseksi</th>
                                    <th>Penanggungjawab (PJ)</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if (count($seksi) < 1)
                                <tr>
                                    <td colspan="3" style="text-align:center; font-style:italic; color:dimgrey">Belum ada data</td>
                                </tr>
                                @else
                                    @foreach ($seksi as $wow)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$wow->nama}}</td>
                                            <td>{{$wow->pj}}</td>
                                            <td>
                                                <button id="wahh" class="editin btn btn-sm btn-warning" data-id="{{$wow->id}}" data-nama="{{$wow->nama}}" data-pj="{{$wow->pj}}"><i class="fas fa-wrench"></i> Ubah</button>
                                                <button data-iden="{{$wow->id}}" class="hapusin btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @endif
</div>    
@endsection

@section('script')
<script>
$(document).on('click', '#tambah_lingkungan', function(){
  // tampilkan form
  show(document.getElementById('form_lingkungan'));
  function show(elements, specifiedDisplay){
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = specifiedDisplay || 'block';
      }
  }

  // sembunyikan tombol tambah
  hide(document.getElementById('tombolan'));
  function hide (elements) {
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = 'none';
      }
  }

  // tampilkan tombol batal
  show(document.getElementById('batalin'));
  function show(elements, specifiedDisplay){
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = specifiedDisplay || 'block';
      }
  }
  document.getElementById('nama_seksi').focus();
  $(".editin").attr("disabled", true);
  $(".hapusin").attr("disabled", true);

});

$(document).on('click', '#batal_tambah', function(){
  // tampilkan tombol tambah
  show(document.getElementById('tombolan'));
  function show(elements, specifiedDisplay){
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = specifiedDisplay || 'block';
      }
  }

  // sembunyikan form tambah
  hide(document.getElementById('form_lingkungan'));
  function hide (elements) {
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = 'none';
      }
  }

  // sembunyikan tombol batal
  hide(document.getElementById('batalin'));
  function hide (elements) {
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = 'none';
      }
  }
  $(".hapusin").attr("disabled", false);
  $(".editin").attr("disabled", false);
});

// KETIKA TOMBOL EDIT DITEKAN
$(document).on('click', '.editin', function(){
  // tampilkan form
  show(document.getElementById('edit_lingkungan'));
  function show(elements, specifiedDisplay){
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = specifiedDisplay || 'block';
      }
  }
  // sembunyikan tombol tambah
  hide(document.getElementById('tombolan'));
  function hide (elements) {
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = 'none';
      }
  }
  // tampilkan tombol batal edit
  show(document.getElementById('batale'));
  function show(elements, specifiedDisplay){
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = specifiedDisplay || 'block';
      }
  }
  document.getElementById("nama_seksiedit").value = $(this).data('nama');
  document.getElementById("nama_pjedit").value = $(this).data('pj');
  document.getElementById("seksi_id").value = $(this).data('id');
  document.getElementById('nama_seksiedit').focus();
  $(".hapusin").attr("disabled", true);
});

$(document).on('click', '#batale', function(){
  // tampilkan tombol tambah
  show(document.getElementById('tombolan'));
  function show(elements, specifiedDisplay){
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = specifiedDisplay || 'block';
      }
  }
  // sembunyikan form tambah
  hide(document.getElementById('edit_lingkungan'));
  function hide (elements) {
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = 'none';
      }
  }

  // sembunyikan tombol batal
  hide(document.getElementById('batale'));
  function hide (elements) {
      elements = elements.length ? elements : [elements];
      for (var index = 0; index < elements.length; index++) {
          elements[index].style.display = 'none';
      }
  }
  $(".hapusin").attr("disabled", false);

});

$(document).on('click', '.hapusin', function(){
  if (confirm('Hapus seksi/subseksi? Semua informasi dari seksi/subseksi bidang akan terhapus.')){
    // console.log($(this).data('iden'));
    window.location= '{{url('pengurus/organisasi/seksi/delete')}}/'+$(this).data('iden');
  }else{
    // do nothing
  } 
});
</script> 
@endsection