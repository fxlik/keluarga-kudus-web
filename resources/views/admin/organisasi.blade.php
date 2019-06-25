@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kelola Organisasi</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-envelope"></i>
        Organisasi
    </div>
    <div class="card-body">
        <h3>Dalam Pengembangan</h3>
    </div>
</div>
@endsection
@section('script')
@endsection