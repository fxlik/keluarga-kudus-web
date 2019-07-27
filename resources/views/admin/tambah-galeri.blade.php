@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.slider')}}">Kelola Galeri</a>
  </li>
  <li class="breadcrumb-item active">Tambah Galeri</li>
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
        <i class="fas fa-calendar"></i>
        Kelola Galeri
    </div>
    <div class="card-body">
      <div class="content-group">
        <div style="margin-bottom:15px;">
          <a href="{{route('pengurus.galeri')}}" class="btn btn-xs btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <form action="{{route('pengurus.galeriPost')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
              <div class="form-label-group">
                  <input name="foto" type="file" id="foto" class="form-control" placeholder="Foto" required>
                  <label for="foto">Foto </label>
                  <span style="color:crimson; font-size:13px;"><i>*Pastikan foto memiliki resolusi tinggi (HD)</i></span><br>
                  <img style="width:100px; height:auto;" id="blah" src="#" alt="galeri-photo-preview">
              </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input name="caption" type="text" id="caption" class="form-control" placeholder="Keterangan Singkat *" required="required" autofocus="autofocus">
                <label for="caption">Caption Singkat *</label>
                <span style="color:darkgray; font-size:13px;"><i>*Caption Singkat</i></span>
            </div>
          </div>
          <button style="width:100px;" class="btn btn-primary btn-block" onclick="return confirm('Tambah foto ke galeri?')" type="submit">Simpan</button>
        </form>
      </div>
    </div>
    @endif
</div>    
@endsection

@section('script')
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#foto").change(function() {
  readURL(this);
});

</script>
@endsection