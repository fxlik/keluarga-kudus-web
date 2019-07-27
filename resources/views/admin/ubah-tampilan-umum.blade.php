@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.tampilanUmum')}}">Kelola Informasi Umum</a>
  </li>
  <li class="breadcrumb-item active">Ubah Informasi Umum</li>
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
        Kelola Informasi Umum
    </div>
    <div class="card-body">
    {{-- fuckkkkk --}}
      <div class="content-group">
        <div style="margin-bottom:15px;">
          <a href="{{route('pengurus.tampilanUmum')}}" class="btn btn-xs btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <form action="{{route('pengurus.updateTampilanUmum')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
              <div class="form-label-group">
                  <input name="logo1" type="file" id="logo1" class="form-control" placeholder="Logo Header" >
                  <label for="logo1">Logo Header Website</label>
                  <span style="color:crimson; font-size:13px;"><i>*Pastikan ukuran gambar 146pixel x 41pixel (kira-kira)</i></span><br>
                  <img style="width:100px; height:auto;" id="blah" src="#" alt=" logo-header-preview">
              </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input name="logo2" type="file" id="logo2" class="form-control" placeholder="Logo Footer" >
                <label for="logo2">Logo Footer Website</label>
                <span style="color:crimson; font-size:13px;"><i>*Pastikan ukuran gambar 146pixel x 41pixel (kira-kira), **Logo digunakan di bagian footer website</i></span><br>
                <img style="width:100px; height:auto;" id="blah2" src="#" alt=" logo-footer-preview">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input name="site_title" type="text" id="site_title" value="{{$tampilin->site_title}}" class="form-control" placeholder="Site Title *" required="required" autofocus="autofocus">
                <label for="site_title">Site Title *</label>
                <span style="color:darkgray; font-size:13px;"><i>*Ubah Judul Website</i></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input name="alamat" type="text" id="alamat" value="{{$tampilin->alamat}}" class="form-control" placeholder="Alamat Gereja *" required="required">
                <label for="alamat">Alamat Gereja *</label>
                <span style="color:darkgray; font-size:13px;"><i>*Ubah Informasi Alamat Gereja</i></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input name="no_hp" type="text" id="no_hp" value="{{$tampilin->no_hp}}" class="form-control" placeholder="Telp. Gereja *" required="required">
                <label for="no_hp">Telp. Gereja *</label>
                <span style="color:darkgray; font-size:13px;"><i>*Telp. Gereja</i></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input name="email" type="text" id="email" value="{{$tampilin->email}}" class="form-control" placeholder="Email Gereja Gereja *" required="required">
                <label for="email">Email Gereja *</label>
                <span style="color:darkgray; font-size:13px;"><i>*Ubah Informasi Email Gereja</i></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input name="facebook" type="text" id="facebook" value="{{$tampilin->facebook}}" class="form-control" placeholder="Akun Facebook Gereja *" required="required">
                <label for="facebook">Akun Facebook Gereja *</label>
                <span style="color:darkgray; font-size:13px;"><i>*Ubah Informasi Akun Facebook Gereja</i></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input name="twitter" type="text" id="twitter" value="{{$tampilin->twitter}}" class="form-control" placeholder="Akun Twitter Gereja *" required="required">
                <label for="twitter">Akun Twitter Gereja *</label>
                <span style="color:darkgray; font-size:13px;"><i>*Ubah Informasi Akun Twitter Gereja</i></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input name="instagram" type="text" id="instagram" value="{{$tampilin->instagram}}" class="form-control" placeholder="Akun Instagram Gereja *" required="required">
                <label for="instagram">Akun Instagram Gereja *</label>
                <span style="color:darkgray; font-size:13px;"><i>*Ubah Informasi Akun Instagram Gereja</i></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                <input name="jadwal_ibadah" type="text" id="jadwal_ibadah" value="{{$tampilin->jadwal_ibadah}}" class="form-control" placeholder="Jadwal Ibadah *" required="required">
                <label for="jadwal_ibadah">Jadwal Ibadah *</label>
                <span style="color:darkgray; font-size:13px;"><i>*Ubah Informasi Jadwal Ibadah</i></span>
            </div>
          </div>

          <button style="width:100px;" class="btn btn-primary btn-block" onclick="return confirm('Update Informasi Umum Website?')" type="submit">Update</button>
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

$("#logo1").change(function() {
  readURL(this);
});

function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader2 = new FileReader();
    
    reader2.onload = function(e) {
      $('#blah2').attr('src', e.target.result);
    }
    
    reader2.readAsDataURL(input.files[0]);
  }
}

$("#logo2").change(function() {
  readURL2(this);
});
</script>
@endsection