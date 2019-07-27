@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.slider')}}">Kelola Slider</a>
  </li>
  <li class="breadcrumb-item active">Edit Slider</li>
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
        Kelola Slider
    </div>
    <div class="card-body">
      <div class="content-group">
        <div style="margin-bottom:15px;">
          <a href="{{route('pengurus.slider')}}" class="btn btn-xs btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <form action="{{route('pengurus.sliderUpdate')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="slider_id" value="{{$sliderEdit->id}}">
          <div class="form-group">
              <div class="form-label-group">
                  <input name="foto" type="file" id="foto" class="form-control" placeholder="Foto" >
                  <label for="foto">Foto Slider </label>
                  <span style="color:crimson; font-size:13px;"><i>*Pastikan foto memiliki resolusi tinggi (HD)</i></span><br>
                  <img style="width:100px; height:auto;" id="blah" src="#" alt="slider-photo-preview">
              </div>
          </div>
          
          <div class="form-group">
            <div class="form-label-group">
                <input name="judul" type="text" id="judul" value="{{$sliderEdit->judul}}" class="form-control" placeholder="Judul Slider *" required="required" autofocus="autofocus">
                <label for="judul">Judul Slider *</label>
                <span style="color:darkgray; font-size:13px;"><i>*Judul Slider</i></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <textarea style="width:100%; height:240px;" id="deskripsi" name="deskripsi" required>{{$sliderEdit->deskripsi}}</textarea>
                {{-- <input name="deskripsi" type="text" id="deskripsi" value="{{$sliderEdit->deskripsi}}" class="form-control" placeholder="Deskripsi *" required="required"> --}}
                {{-- <label for="deskripsi">Deskripsi Slider *</label> --}}
                <span style="color:darkgray; font-size:13px;"><i>*Deskripsi Slider</i></span>
            </div>
          </div>
          

          <button style="width:100px;" class="btn btn-primary btn-block" onclick="return confirm('Update Slider?')" type="submit">Update</button>
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