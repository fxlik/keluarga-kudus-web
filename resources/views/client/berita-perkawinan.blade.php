@extends('client.layout')
@section('breadcrump')
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('client.beranda')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita Perkawinan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="blog-area section-padding-100">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Blog Post Area -->
            <div class="col-12 col-lg-8">
                <div class="row">
                    <!-- Single Blog Post Area -->
                    @foreach ($news as $item)
                    <div class="col-12 col-md-6">
                        <div class="single-blog-post mb-50">
                            <div class="post-thumbnail">
                                @if ($item->foto != null)
                                <a href="{{route('client.singleBerita', $item->slug)}}"><img src="{{('client/img/bg-img')}}/{{$item->foto}}" alt=""></a>                                                       
                                @else
                                <img src="{{asset('client/img/bg-img')}}/4.jpg" alt="event-tumbnail">
                                @endif
                            </div>
                            <div class="post-content">
                                <a href="{{route('client.singleBerita', $item->slug)}}" class="post-title">
                                    <h4>{{$item->judul}}</h4>
                                </a>
                                <div class="post-meta d-flex">
                                    <a href="#"> Posted By: <i>{{$item->user->name}}</i></a>
                                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('M d Y')}}</a>
                                </div>
                                <div class="content-group">
                                {{-- @php
                                    echo htmlspecialchars_decode(str_limit($item->deskripsi,180))
                                @endphp --}}
                                </div>
                                <a href="{{route('client.singleBerita', $item->slug)}}"><i>Baca berita selengkapnya..</i> <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagination-area">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{ $news->render("pagination::bootstrap-4") }}
                        </ul>
                    </nav>
                </div>
            </div>
            @include('client._partial.sidebar-detail')
        </div>
    </div>
</div>
@endsection