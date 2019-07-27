@inject('sejarah','App\Http\Controllers\ClientBerandaController')
@extends('client.layout')
@section('breadcrump')
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('client.beranda')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{route('client.berita')}}">Berita</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<section class="blog-content-area section-padding-100">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <div style="margin-bottom:30px;" class="title-in">
                    <center><h4>STRUKTUR KEPENGURUSAN DEWAN PASTORAL PAROKI (DPP) KELUARGA KUDUS, KOTA BARU - PONTIANAK, KEUSKUPAN AGUNG PONTIANAK</h4></center>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                        @foreach ($organisasiinti as $item)
                            <tr>
                                <th style="font-size:16px;">{{$item->nama}}</th>
                                <td>{{$item->pj}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tbody>
                        @foreach ($organisasi as $hime)
                            <tr>
                                <th style="font-size:18px;">{{$hime->nama}}</th>
                                <td>..</td>
                                <tr>
                                    <th>&#10014; Koordinator Bidang</th>
                                    <td>{{$hime->pj}}</td>
                                </tr>
                                @foreach ($hime->seksi as $kom)
                                <tr>
                                    <th>&#10014; {{$kom->nama}}</td>
                                    <td>{{$kom->pj}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection