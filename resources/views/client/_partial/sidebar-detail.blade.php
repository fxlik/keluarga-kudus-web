@inject('beritaSidebar','App\Http\Controllers\ClientBerandaController')
<div class="col-12 col-sm-9 col-md-6 col-lg-3">
    <div class="post-sidebar-area">
        <div class="single-widget-area">
            <!-- Title -->
            <div class="widget-title">
                <h6>Categories</h6>
            </div>
            <ol class="crose-catagories">
                <li><a href="{{route('client.event')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Event</a></li>
                <li><a href="{{route('client.berita')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> Berita</a></li>
                
            </ol>
        </div>
        <!-- ##### Single Widget Area ##### -->
        <div class="single-widget-area">
            <!-- Title -->
            <div class="widget-title">
                <h6>Berita Terbaru</h6>
            </div>
            @foreach ($beritaSidebar->beritaSidebar() as $news)
            <!-- Single Latest Posts -->
            <div class="single-latest-post">
                <a href="{{route('client.singleBerita', $news->slug)}}" class="post-title">
                    <h6>{{$news->judul}}</h6>
                </a>
                <p class="post-date">{{$news->created_at->format('M d Y')}}</p>
            </div>
            @endforeach
            
        </div>
    </div>
</div>