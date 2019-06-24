@inject('slider','App\Http\Controllers\ClientBerandaController')
<!-- ##### Hero Area Start ##### -->
<section class="hero-area hero-post-slides owl-carousel">
        @foreach ($slider->slider() as $yuvia)
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(client/img/bg-img/{{$yuvia->foto}});">
            <!-- Post Content -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">{{$yuvia->judul}}</h2>
                            <p data-animation="fadeInUp" data-delay="300ms">{{$yuvia->deskripsi}}</p>
                            <!-- <a href="#" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms"></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</section>
<!-- ##### Hero Area End ##### -->