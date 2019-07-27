@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.wilayah')}}">Wilayah</a>
  </li>
  <li class="breadcrumb-item active">Kelola Wilayah</li>
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
        <i class="fas fa-flag"></i>
        <b>{{$wilayah->nama}}</b>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                <div class="content-group">
                    <h5>Data Lingkungan</h5>
                    <div id="tombolan" style="margin-bottom:10px;">
                        <a id="tambah_lingkungan" class="btn btn-sm btn-success" href="#"><i class="fas fa-plus"></i> Tambah Lingkungan</a>
                    </div>
                    <div id="batalin" style="margin-bottom:10px; display:none;">
                        <a id="batal_tambah" class="btn btn-sm btn-danger" href="#"><i class="fas fa-times"></i> Batalkan Tambah</a>
                    </div>
                    
                    <div id="form_lingkungan" style="margin-bottom:12px; display:none;">
                        <form action="{{route('pengurus.lingkunganPost')}}" class="form-horizontal" role="form" data-toggle="validator" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input type="hidden" name="wilayah_id" value="{{$wilayah->id}}">
                          <div class="form-group">
                            <div class="form-label-group">
                              <input id="nama_lingkungan" type="text" name="nama_lingkungan" class="form-control" placeholder="Nama Lingkungan" required>              
                              <label for="nama_lingkungan">Nama Wilayah</label>
                              {{-- <span style="color:cornflowerblue; font-size:13px;"><i>*</i></span><br> --}}
                            </div>
                          </div>
                          <button onclick="return confirm('Simpan Data Lingkungan?')" type="submit" class="btn btn-sm btn-success add" id="simpanBarang">Simpan</button>
                        </form>
                    </div>

                    {{-- buat edit --}}
                    <div id="batale" style="margin-bottom:10px; display:none;">
                        <a id="batal_edit" class="btn btn-md btn-danger" href="#"><i class="fas fa-times"></i> Batalkan Edit</a>
                    </div>
                    <div id="edit_lingkungan" style="margin-bottom:12px; display:none;">
                        <form action="{{route('pengurus.lingkunganUpdate')}}" class="form-horizontal" role="form" data-toggle="validator" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input type="hidden" name="wilayah_idedit" value="{{$wilayah->id}}">
                          <div class="form-group">
                            <div class="form-label-group">
                              <input id="nama_lingkunganedit" type="text" name="nama_lingkunganedit" class="form-control" placeholder="Nama Lingkungan" required>              
                              <label for="nama_lingkunganedit">Nama Wilayah</label>
                              {{-- <span style="color:cornflowerblue; font-size:13px;"><i>*</i></span><br> --}}
                            </div>
                          </div>
                          <input type="hidden" name="lingkungan_id" id="lingkungan_id">
                          <button onclick="return confirm('Update Data Lingkungan?')" type="submit" class="btn btn-sm btn-success add" id="simpanBarang">Simpan</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lingkungan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lingkungan</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if (count($lingkungan) < 1)
                                <tr>
                                    <td colspan="3" style="text-align:center; font-style:italic; color:dimgrey">Belum ada data</td>
                                </tr>
                                @else
                                    @foreach ($lingkungan as $tl)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$tl->nama}}</td>
                                            <td>
                                                <button id="wahh" class="editin btn btn-sm btn-warning" data-id="{{$tl->id}}" data-nama="{{$tl->nama}}"><i class="fas fa-wrench"></i> Ubah</button>
                                                <button data-iden="{{$tl->id}}" class="hapusin btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="content-group">
                    <h5>Pengelola Wilayah</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>.</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>.</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($pengelola as $p)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$p->name}}</td>
                                    <td>{{$p->email}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                                </tr>
                                @endforeach
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
  document.getElementById('nama_lingkungan').focus();
  $(".hapusin").attr("disabled", true);
  $(".editin").attr("disabled", true);

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
  document.getElementById("nama_lingkunganedit").value = $(this).data('nama');
  document.getElementById("lingkungan_id").value = $(this).data('id');
  document.getElementById('nama_lingkunganedit').focus();
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
  if (confirm('Hapus lingkungan? Semua informasi dari lingkungan akan terhapus.')){
    // console.log($(this).data('iden'));
    window.location= '{{url('pengurus/wilayah/lingkungan/delete')}}/'+$(this).data('iden');
  }else{
    // do nothing
  } 
});
</script> 
@endsection