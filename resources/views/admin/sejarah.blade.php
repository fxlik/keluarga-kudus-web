@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kelola Sejarah</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-calendar"></i>
        Kelola Sejarah
    </div>
    <div class="card-body">
        <div style="margin-bottom:15px;">
            <a class="btn btn-xs btn-success" href="{{route('pengurus.sejarahUpdate')}}"><i class=" fas fa-file"></i> Edit Sejarah</a>
        </div>
        <div class="content-group">
            @php
                echo htmlspecialchars_decode($sejarah->sejarah)
            @endphp
        </div>
    </div>
</div>
@endsection

@section('script')
    
@endsection