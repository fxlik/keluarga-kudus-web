@extends('client.layout')
@section('content')

{{-- slider client/ --}}
@include('client._partial.slider')

<!-- ##### About Area Start ##### -->
<section class="about-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading">
                    <h2>Shalom..</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, nulla! Praesentium cumque quos magnam deleniti doloremque ipsa qui sit aliquam, minima quae dolores sapiente velit quasi voluptatem natus error recusandae.</p>
                </div>
            </div>
        </div>

        <div class="row about-content justify-content-center">
            <!-- Single About Us Content -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="about-us-content mb-100">
                    <img src="{{asset('client/img/bg-img')}}/{{$sambutan->foto}}" alt="sambutan-gambar">
                    <div class="about-text">
                        <h4>Sambutan</h4>
                        <p>{{str_limit($sambutan->sambutan,200)}}</p>
                        <a href="{{route('client.sambutan')}}">Selanjutnya.. <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Single About Us Content -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="about-us-content mb-100">
                    <img src="{{asset('client/img/bg-img')}}/{{$sejarah->foto}}" alt="">
                    <div class="about-text">
                        <h4>Sejarah</h4>
                        <p>{{str_limit($sejarah->sejarah,200)}}</p>
                        <a href="{{route('client.sejarah')}}">Selanjutnya.. <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Single About Us Content -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="about-us-content mb-100">
                    <img src="{{asset('client/img/bg-img/5.jpg')}}" alt="">
                    <div class="about-text">
                        <h4>Pelayanan</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, assumenda impedit? Quaerat amet consectetur culpa laudantium ducimus iure, alias aspernatur itaque quas. Nihil delectus, odio facere fuga laborum ipsum ipsam?</p>
                        <a href="">Selanjutnya.. <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### About Area End ##### -->

<!-- ##### Upcoming Events Area Start ##### -->
<!-- felik -->
<section class="upcoming-events-area section-padding-0-100">
    <div class="upcoming-events-heading bg-img bg-overlay bg-fixed" style="background-image: url(client/img/bg-img/1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-left white">
                        <h2>Event Terdekat</h2>
                        <p>lorem ipsum lorem ipsum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="upcoming-events-slides-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="upcoming-slides owl-carousel">
                        <div class="single-slide">
                            @foreach ($event as $acara)
                            <!-- Single Upcoming Events Area -->
                            <div class="single-upcoming-events-area d-flex flex-wrap align-items-center">
                                
                                <div class="upcoming-events-thumbnail">
                                    <img src="{{asset('client/img/bg-img')}}/{{$acara->foto}}" alt="">
                                </div>
                                
                                <div class="upcoming-events-content d-flex flex-wrap align-items-center">
                                    <div class="events-text">
                                        <h4>{{$acara->judul}}</h4>
                                        <div class="events-meta">
                                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($acara->tanggal)->format('M d Y')}}</a>
                                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($acara->tanggal)->format('H:i A')}}</a>
                                            <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($acara->tanggal)->format('H:i A')}}</a>
                                        </div>
                                        <p>{{str_limit($acara->deskripsi, 150)}}</p>
                                        <a href="{{route('client.singleEvent', $acara->slug)}}">Selanjutnya.. <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                    <div class="find-out-more-btn">
                                        <a href="{{route('client.singleEvent', $acara->slug)}}" class="btn crose-btn btn-2">Selengkapnya..</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Upcoming Events Area End ##### -->

<!-- ##### Gallery Area Start ##### -->
<div class="gallery-area d-flex flex-wrap">
    <!-- Single Gallery Area -->
    <div class="single-gallery-area">
        <a href="client/img/bg-img/13.jpg" class="gallery-img" title="Gallery Image 1">
            <img src="client/img/bg-img/13.jpg" alt="">
        </a>
    </div>

    <!-- Single Gallery Area -->
    <div class="single-gallery-area">
        <a href="client/img/bg-img/14.jpg" class="gallery-img" title="Gallery Image 2">
            <img src="client/img/bg-img/14.jpg" alt="">
        </a>
    </div>

    <!-- Single Gallery Area -->
    <div class="single-gallery-area">
        <a href="client/img/bg-img/15.jpg" class="gallery-img" title="Gallery Image 3">
            <img src="client/img/bg-img/15.jpg" alt="">
        </a>
    </div>

    <!-- Single Gallery Area -->
    <div class="single-gallery-area">
        <a href="client/img/bg-img/16.jpg" class="gallery-img" title="Gallery Image 4">
            <img src="client/img/bg-img/16.jpg" alt="">
        </a>
    </div>

    <!-- Single Gallery Area -->
    <div class="single-gallery-area">
        <a href="client/img/bg-img/17.jpg" class="gallery-img" title="Gallery Image 5">
            <img src="client/img/bg-img/17.jpg" alt="">
        </a>
    </div>

    <!-- Single Gallery Area -->
    <div class="single-gallery-area">
        <a href="client/img/bg-img/18.jpg" class="gallery-img" title="Gallery Image 6">
            <img src="client/img/bg-img/18.jpg" alt="">
        </a>
    </div>

    <!-- Single Gallery Area -->
    <div class="single-gallery-area">
        <a href="client/img/bg-img/19.jpg" class="gallery-img" title="Gallery Image 7">
            <img src="client/img/bg-img/19.jpg" alt="">
        </a>
    </div>

    <!-- Single Gallery Area -->
    <div class="single-gallery-area">
        <a href="client/img/bg-img/20.jpg" class="gallery-img" title="Gallery Image 8">
            <img src="client/img/bg-img/20.jpg" alt="">
        </a>
    </div>

    <!-- Single Gallery Area -->
    <div class="single-gallery-area">
        <a href="client/img/bg-img/21.jpg" class="gallery-img" title="Gallery Image 9">
            <img src="client/img/bg-img/21.jpg" alt="">
        </a>
    </div>

    <!-- Single Gallery Area -->
    <div class="single-gallery-area">
        <a href="client/img/bg-img/22.jpg" class="gallery-img" title="Gallery Image 10">
            <img src="client/img/bg-img/22.jpg" alt="">
        </a>
    </div>
</div>
<!-- ##### Gallery Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<section class="blog-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading">
                    <h2>Berita Terbaru</h2>
                    <p>Berita terbaru seputar gereja</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach ($berita as $news)
            <!-- Single Blog Post Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-post mb-100">
                    <div class="post-thumbnail">
                        <a href="#"><img src="{{('client/img/bg-img')}}/{{$news->foto}}" alt=""></a>
                    </div>
                    <div class="post-content">
                        <a href="{{route('client.singleBerita', $news->slug)}}" class="post-title">
                            <h4>{{$news->judul}}</h4>
                        </a>
                        <div class="post-meta d-flex">
                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> {{$news->user->name}}</a>
                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{$news->created_at->format('M d Y')}}</a>
                        </div>
                        <p class="post-excerpt">{{str_limit($news->deskripsi,200)}}</p>
                        <a href="{{route('client.singleBerita', $news->slug)}}">Selanjutnya.. <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ##### Blog Area End ##### -->
@endsection