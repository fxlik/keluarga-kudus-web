@extends('client.layout')
@section('breadcrump')
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('client.beranda')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pelayan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="events-area section-padding-100">
    <div class="container">
        <div class="row">
            <!-- Events Title -->
            <div class="col-12">
                <div class="events-title">
                    <h2>Dalam Proses Pengembangan</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection