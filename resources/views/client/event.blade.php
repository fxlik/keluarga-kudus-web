@extends('client.layout')
@section('breadcrump')
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('client.beranda')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Event</li>
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
                    <h2>Upcoming Events</h2>
                </div>
            </div>
            @foreach ($events as $item)
            <div class="col-12">
                <!-- Single Upcoming Events Area -->
                <div class="single-upcoming-events-area d-flex flex-wrap align-items-center">
                    <!-- Thumbnail -->
                    <div class="upcoming-events-thumbnail">
                        <img src="{{asset('client/img/bg-img')}}/{{$item->foto}}" alt="upcoming-image">
                    </div>
                    <!-- Content -->
                    <div class="upcoming-events-content d-flex flex-wrap align-items-center">
                        <div class="events-text">
                            <h4>{{$item->judul}}</h4>
                            <div class="events-meta">
                                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($item->tanggal)->format('M d Y')}}</a>
                                <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($item->tanggal)->format('H:i A')}} - selesai</a>
                                <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($item->tanggal)->format('H:i A')}}</a>
                            </div>
                            <div class="content-group">
                                @php
                                    echo htmlspecialchars_decode(str_limit($item->deskripsi,180))
                                @endphp
                            </div>
                            <a href="{{route('client.singleEvent', $item->slug)}}">Selengkapnya <i class="fa fa-angle-double-right"></i></a>
                        </div>
                        <div class="find-out-more-btn">
                            <a href="{{route('client.singleEvent', $item->slug)}}" class="btn crose-btn btn-2">DETAIL</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12">
                <div class="pagination-area mt-70">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            {{ $events->render("pagination::bootstrap-4") }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection