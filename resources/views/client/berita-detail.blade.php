@extends('client.layout')
@section('breadcrump')
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('client.beranda')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{route('client.berita')}}">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
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
                            @if ($berita->foto != null)
                            <img src="{{asset('client/img/bg-img')}}/{{$berita->foto}}" alt="event-tumbnail">                                
                            @else
                            <img src="{{asset('client/img/bg-img')}}/4.jpg" alt="event-tumbnail">
                            @endif
                        </div>
                        <div class="post-content">
                            <h2 class="post-title">{{$berita->judul}}</h2>
                            <div>
                                <a style="color:brown;" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <i>{{ \Carbon\Carbon::parse($berita->created_at)->format('M d Y')}}</i></a>
                            </div>
                            <div class="content-group">
                                <?php
                                $str ="{$berita->deskripsi}";
                                
                                echo htmlspecialchars_decode($str);
                                ?>
                            </div>
                            {{-- <p>{{$berita->deskripsi}}</p> --}}
                        </div>
                    </div>

                    <!-- Post Tags & Share -->
                    <div class="post-tags-share d-flex justify-content-between align-items-center">
                        <!-- Tags -->
                        <ol class="popular-tags d-flex flex-wrap">
                            <li>Posted By: <i>{{$berita->user->name}}</i></li>
                        </ol>
                        <!-- Share -->
                        <div class="post-share">
                            <span>Share:</span>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @include('client._partial.sidebar-detail')
        </div>
    </div>
</section>
@endsection