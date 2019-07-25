@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Wilayah</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-flag"></i>
        Wilayah
    </div>
    <div class="card-body">
      <div class="content-group">
        <div id="tombolan" style="margin-bottom:10px;">
          <a id="tambah_wilayah" class="btn btn-md btn-success" href="#"><i class="fas fa-plus"></i> Tambah Wilayah</a>
        </div>
  
        <div id="batalin" style="margin-bottom:10px; display:none;">
            <a id="batal_tambah" class="btn btn-md btn-danger" href="#"><i class="fas fa-times"></i> Batalkan Tambah</a>
        </div>
        <div id="form_wilayah" style="margin-bottom:12px; display:none;">
          <form action="{{route('pengurus.wilayahPost')}}" class="form-horizontal" role="form" data-toggle="validator" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <div class="form-label-group">
                <input id="nama_wilayah" type="text" name="nama_wilayah" class="form-control" placeholder="Nama Wilayah" required>              
                <label for="nama_wilayah">Nama Wilayah</label>
                <span style="color:cornflowerblue; font-size:13px;"><i>*</i></span><br>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input id="nama_ketua" type="text" name="nama_ketua" class="form-control" placeholder="Nama Ketua Wilayah" required>              
                <label for="nama_ketua">Nama Ketua Wilayah</label>
                <span style="color:cornflowerblue; font-size:13px;"><i>*</i></span><br>
              </div>
            </div> 
            <button onclick="return confirm('Simpan Data Wilayah?')" type="submit" class="btn btn-sm btn-success add" id="simpanBarang">Simpan</button>
          </form>
        </div>
        {{-- buat edit --}}
        <div id="batale" style="margin-bottom:10px; display:none;">
          <a id="batal_edit" class="btn btn-md btn-danger" href="#"><i class="fas fa-times"></i> Batalkan Edit</a>
        </div>
        <div id="edit_wilayah" style="margin-bottom:12px; display:none;">
          <form action="{{route('pengurus.wilayahUpdate')}}" class="form-horizontal" role="form" data-toggle="validator" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <div class="form-label-group">
                <input id="edit_namawilayah" type="text" name="edit_namawilayah" class="form-control" placeholder="Nama Wilayah" required>              
                <label for="edit_namawilayah">Nama Wilayah</label>
                <span style="color:cornflowerblue; font-size:13px;"><i>*</i></span><br>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input id="edit_ketua" type="text" name="edit_ketua" class="form-control" placeholder="Nama Ketua Wilayah" required>              
                <label for="edit_ketua">Nama Ketua Wilayah</label>
                <span style="color:cornflowerblue; font-size:13px;"><i>*</i></span><br>
              </div>
            </div> 
            <input type="hidden" name="wilayah_id" id="wilayah_id">
            <button onclick="return confirm('Update Data Wilayah?')" type="submit" class="btn btn-sm btn-primary add" id="updateWilayah">Update</button>
          </form>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>.</th>
              <th>Nama Wilayah</th>
              <th>Nama Ketua</th>
              <th>.</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>.</th>
              <th>Nama Wilayah</th>
              <th>Nama Ketua</th>
              <th>.</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($wilayah as $item)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <button onclick="location.href='{{route('pengurus.wilayahKelola', $item->id)}}'" class="kelolar btn btn-sm btn-primary"><i class="fas fa-cog"></i> Kelola</button>

                </td>
                <td>{{$item->nama}}</td>
                <td>{{$item->ketua}}</td>
                <td>
                  <button id="wahh" class="kelolaed btn btn-sm btn-warning" data-id="{{$item->id}}" data-nama="{{$item->nama}}" data-ketua="{{$item->ketua}}"><i class="fas fa-wrench"></i> Ubah</button>
                  {{-- <a class="kelola btn btn-xs btn-danger" href="{{route('pengurus.wilayahDelete', $item->id)}}">Hapus</a> --}}
                  <button data-iden="{{$item->id}}" class="kelola btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
@section('script')
<script>
$(document).on('click', '#tambah_wilayah', function(){
  // tampilkan form
  show(document.getElementById('form_wilayah'));
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
  document.getElementById('nama_wilayah').focus();
  $(".kelola").attr("disabled", true);
  $(".kelolaed").attr("disabled", true);
  $(".kelolar").attr("disabled", true);
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
  hide(document.getElementById('form_wilayah'));
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
  $(".kelola").attr("disabled", false);
  $(".kelolaed").attr("disabled", false);
  $(".kelolar").attr("disabled", false);
});

// KETIKA TOMBOL EDIT DITEKAN
$(document).on('click', '#wahh', function(){
  // tampilkan form
  show(document.getElementById('edit_wilayah'));
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
  document.getElementById("edit_namawilayah").value = $(this).data('nama');
  document.getElementById("edit_ketua").value = $(this).data('ketua');        
  document.getElementById("wilayah_id").value = $(this).data('id');
  $(".kelola").attr("disabled", true);
  $(".kelolar").attr("disabled", true);
  document.getElementById('edit_namawilayah').focus();
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
  hide(document.getElementById('edit_wilayah'));
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
  $(".kelola").attr("disabled", false);
  $(".kelolar").attr("disabled", false);

});

$(document).on('click', '.kelola', function(){
  if (confirm('Hapus wilayah? Semua informasi termasuk data user wilayah akan terhapus.')){
    // console.log($(this).data('iden'));
    window.location= 'wilayah/delete/'+$(this).data('iden');
  }else{
    // do nothing
  } 
});

</script>
@endsection