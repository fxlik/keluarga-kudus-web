@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pw.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Overview</li>
</ol>
@endsection
@section('content')
<!-- Icon Cards-->
@if (Auth::user()->is_verified == 1)
<div class="row">
  <div class="col-md-12">
    <h5><b>Selamat Datang pengurus wilayah <i>{{Auth::user()->wilayah->nama}}</i></b></h5>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-comments"></i>
        </div>
        <div class="mr-5"> Usulan Pelayanan</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">Selengkapnya</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-shopping-cart"></i>
        </div>
        <div class="mr-5"> Berita</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">Kelola Berita..</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
</div>
@else
<div class="card mb-3">
  <div class="card-header">
      <i class="fas fa-user"></i>
      USER BELUM TERVERIFIKASI
  </div>
  <div class="card-body">
    <div class="alert alert-danger">
        <h5><b>AKUN ANDA BELUM DIVERIFIKASI OLEH OPERATOR WEBSITE..!!</b></h5>
        Anda dapat mengakses menu lain setelah akun ter-verifikasi. Silakan Hubungi Operator..
    </div>
  </div>
</div>
@endif




@endsection