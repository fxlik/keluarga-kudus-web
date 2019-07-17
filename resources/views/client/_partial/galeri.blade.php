@inject('galeri','App\Http\Controllers\ClientBerandaController')
<div class="gallery-area d-flex flex-wrap">
    @foreach ($galeri->galeri() as $windy)
    <!-- Single Gallery Area -->
    <div class="single-gallery-area">
        <a href="{{asset('client/img/bg-img')}}/{{$windy->foto}}" class="gallery-img" title="{{$windy->caption}}">
            <img src="{{asset('client/img/bg-img')}}/{{$windy->foto}}" alt="foto-galeri">
        </a>
        </div>
    @endforeach
</div>