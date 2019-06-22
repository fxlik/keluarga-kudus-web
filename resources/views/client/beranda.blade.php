@extends('client.layout')
@section('content')
<!-- ##### Hero Area Start ##### -->
<section class="hero-area hero-post-slides owl-carousel">
    <!-- Single Hero Slide -->
    <div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(client/img/bg-img/1.jpg);">
        <!-- Post Content -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-slides-content">
                        <h2 data-animation="fadeInUp" data-delay="100ms">Go go go</h2>
                        <p data-animation="fadeInUp" data-delay="300ms">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum modi voluptas, odit reiciendis magnam dolor quia vero, explicabo nisi pariatur minus architecto nemo tempore cumque quidem nulla velit eos eum!</p>
                        <!-- <a href="#" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms"></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Single Hero Slide -->
    <div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(client/img/bg-img/2.jpg);">
        <!-- Post Content -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-slides-content">
                        <h2 data-animation="fadeInUp" data-delay="100ms">Yaya</h2>
                        <p data-animation="fadeInUp" data-delay="300ms">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum modi voluptas, odit reiciendis magnam dolor quia vero, explicabo nisi pariatur minus architecto nemo tempore cumque quidem nulla velit eos eum!</p>
                        <!-- <a href="#" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms"></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Hero Area End ##### -->

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
                    <img src="{{asset('client/img/bg-img/3.jpg')}}" alt="">
                    <div class="about-text">
                        <h4>Sambutan</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo illo distinctio sapiente repudiandae odit reprehenderit! Itaque maiores facere dolore alias deleniti, explicabo minima voluptates nemo aut laborum voluptatum facilis officiis.</p>
                        <a href="#">Selanjutnya.. <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Single About Us Content -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="about-us-content mb-100">
                    <img src="{{asset('client/img/bg-img/4.jpg')}}" alt="">
                    <div class="about-text">
                        <h4>Sejarah</h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus mollitia earum architecto? Reiciendis ullam sit voluptatum repudiandae atque nostrum mollitia ipsa hic quos eaque, vitae quae fugit libero facere distinctio?</p>
                        <a href="#">Selanjutnya.. <i class="fa fa-angle-double-right"></i></a>
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
                        <a href="#">Selanjutnya.. <i class="fa fa-angle-double-right"></i></a>
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
                            <div class="single-upcoming-events-area d-flex flex-wrap align-items-center">
                                
                                <div class="upcoming-events-thumbnail">
                                    <img src="{{asset('client/img/bg-img/23.jpg')}}" alt="">
                                </div>
                                
                                <div class="upcoming-events-content d-flex flex-wrap align-items-center">
                                    <div class="events-text">
                                        <h4>Seminar 1satu</h4>
                                        <div class="events-meta">
                                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 16 Juni 2019</a>
                                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 09:00 - 17:00</a>
                                            <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> UPT TIK UNTAN</a>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta consequatur odio quos repellendus eveniet labore reprehenderit odit, laborum ratione eaque error deserunt necessitatibus qui accusamus voluptatem itaque alias, laudantium reiciendis.</p>
                                        <a href="#">Selanjutnya.. <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                    <div class="find-out-more-btn">
                                        <a href="#" class="btn crose-btn btn-2">Selengkapnya..</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="single-upcoming-events-area d-flex flex-wrap align-items-center">
                                
                                <div class="upcoming-events-thumbnail">
                                    <img src="{{asset('client/img/bg-img/24.jpg')}}" alt="">
                                </div>
                                
                                <div class="upcoming-events-content d-flex flex-wrap align-items-center">
                                    <div class="events-text">
                                        <h4>Seminar 1satu</h4>
                                        <div class="events-meta">
                                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 16 Juni 2019</a>
                                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 09:00 - 17:00</a>
                                            <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> UPT TIK UNTAN</a>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta consequatur odio quos repellendus eveniet labore reprehenderit odit, laborum ratione eaque error deserunt necessitatibus qui accusamus voluptatem itaque alias, laudantium reiciendis.</p>
                                        <a href="#">Selanjutnya.. <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                    <div class="find-out-more-btn">
                                        <a href="#" class="btn crose-btn btn-2">Selengkapnya..</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Upcoming Events Area -->
                            <div class="single-upcoming-events-area d-flex flex-wrap align-items-center">
                                
                                <div class="upcoming-events-thumbnail">
                                    <img src="{{asset('client/img/bg-img/25.jpg')}}" alt="">
                                </div>
                                
                                <div class="upcoming-events-content d-flex flex-wrap align-items-center">
                                    <div class="events-text">
                                        <h4>Seminar 1satu</h4>
                                        <div class="events-meta">
                                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 16 Juni 2019</a>
                                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 09:00 - 17:00</a>
                                            <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> UPT TIK UNTAN</a>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta consequatur odio quos repellendus eveniet labore reprehenderit odit, laborum ratione eaque error deserunt necessitatibus qui accusamus voluptatem itaque alias, laudantium reiciendis.</p>
                                        <a href="#">Selanjutnya.. <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                    <div class="find-out-more-btn">
                                        <a href="#" class="btn crose-btn btn-2">Selengkapnya..</a>
                                    </div>
                                </div>
                            </div>
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
            <!-- Single Blog Post Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-post mb-100">
                    <div class="post-thumbnail">
                        <a href="3"><img src="client/img/bg-img/10.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <a href="#" class="post-title">
                            <h4>JUDUL BERITA TERBARU KE-1</h4>
                        </a>
                        <div class="post-meta d-flex">
                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Admin</a>
                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 15 Juni 2019</a>
                        </div>
                        <p class="post-excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos eum alias id quis est ullam sunt, odit, voluptatem officiis obcaecati accusamus. Itaque omnis hic possimus officia distinctio cumque! Commodi, a.</p>
                    </div>
                </div>
            </div>

            <!-- Single Blog Post Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-post mb-100">
                    <div class="post-thumbnail">
                        <a href="#"><img src="client/img/bg-img/11.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <a href="#" class="post-title">
                            <h4>JUDUL BERITA TERBARU KE-2</h4>
                        </a>
                        <div class="post-meta d-flex">
                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Admin</a>
                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 15 Juni 2019</a>
                        </div>
                        <p class="post-excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos eum alias id quis est ullam sunt, odit, voluptatem officiis obcaecati accusamus. Itaque omnis hic possimus officia distinctio cumque! Commodi, a.</p>
                    </div>
                </div>
            </div>

            <!-- Single Blog Post Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-post mb-100">
                    <div class="post-thumbnail">
                        <a href="#"><img src="client/img/bg-img/12.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <a href="#" class="post-title">
                            <h4>JUDUL BERITA TERBARU KE-3</h4>
                        </a>
                        <div class="post-meta d-flex">
                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Admin</a>
                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 15 Juni 2019</a>
                        </div>
                        <p class="post-excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos eum alias id quis est ullam sunt, odit, voluptatem officiis obcaecati accusamus. Itaque omnis hic possimus officia distinctio cumque! Commodi, a.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Blog Area End ##### -->
@endsection