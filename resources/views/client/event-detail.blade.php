@extends('client.layout')
@section('breadcrump')
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('client.beranda')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{route('client.event')}}">Event</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Event Details</li>
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
            <!-- Blog Posts Area -->
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">
                    <!-- Post Details Area -->
                    <div class="single-post-details-area">
                        <div class="post-thumbnail mb-30">
                            <img src="{{asset('client/img/bg-img')}}/{{$event->foto}}" alt="event-tumbnail">
                        </div>
                        <div class="post-content">
                            <h2 class="post-title">{{$event->judul}}</h2>
                            <div>
                                <a style="color:brown" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($event->tanggal)->format('M d Y')}}</a> /
                                <a style="color:brown" href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($event->tanggal)->format('H:i A')}}</a> /
                                <a style="color:brown" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$event->tempat}}</a> 
                            </div>
                            <p>{{$event->deskripsi}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @include('client._partial.sidebar-detail')
        </div>
    </div>
</section>
@endsection