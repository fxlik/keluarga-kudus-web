@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kelola Tampilan Umum</li>
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
          <a href="{{route('pengurus.editTampilanUmum')}}" class="btn btn-xs btn-primary"><i class="fas fa-cog"></i>Ubah Informasi Umum Website</a>
        </div>
        <div class="table-responsive" id="kontennih">
          <table class="table">
            <tr>
              <th>Site Icon 1 (Header)</th>
              <td><img src="{{asset('client/img/core-img')}}/{{$tampilan->logo1}}" alt="site-icon"></td>
            </tr>
            <tr style="background:#1D0B0B">
              <th><p style="color:white;">Site Icon 2 (footer)</p></th>
              <td><img src="{{asset('client/img/core-img')}}/{{$tampilan->logo2}}" alt="site-icon"></td>
            </tr>
            <tr>
              <th>Site Title</th>
              <td>{{$tampilan->site_title}}</td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td>{{$tampilan->alamat}}</td>
            </tr>
            <tr>
              <th>No. HP</th>
              <td>{{$tampilan->no_hp}}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{$tampilan->email}}</td>
            </tr>
            <tr>
                <th>Facebook</th>
                <td>{{$tampilan->facebook}}</td>
            </tr>
            <tr>
              <th>Twitter</th>
              <td>{{$tampilan->twitter}}</td>
            </tr>
            <tr>
              <th>Instagram</th>
              <td>{{$tampilan->instagram}}</td>
            </tr>
            <tr>
              <th>Jadwal Ibadah</th>
              <td>{{$tampilan->jadwal_ibadah}}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    @endif
</div>    
@endsection

@section('script')
    
@endsection