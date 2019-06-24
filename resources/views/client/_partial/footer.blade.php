<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget mb-70">
                        <a href="#" class="footer-logo"><img src="{{asset('client/img/core-img')}}/{{$tampilan->tampilan()->logo2}}" alt=""></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget mb-70">
                        <h5 class="widget-title">Akses Cepat</h5>
                        <nav class="footer-menu">
                            <ul>
                                <li><a href="{{route('client.beranda')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Beranda</a></li>
                                <li><a href="{{route('client.sambutan')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sambutan</a></li>
                                <li><a href="{{route('client.sejarah')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sejarah</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Wilayah</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Pelayan</a></li>
                                <li><a href="{{route('client.event')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Event Gereja</a></li>
                                <li><a href="{{route('client.berita')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Berita</a></li>
                                <li><a href="{{route('client.kontak')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Kontak</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-footer-widget mb-70">
                        <h5 class="widget-title">Hubungi Kami</h5>

                        <div class="contact-information">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{$tampilan->tampilan()->alamat}}</p>
                            <a href="callto:001-1234-88888"><i class="fa fa-phone" aria-hidden="true"></i> {{$tampilan->tampilan()->no_hp}}</a>
                            <a href="mailto:info.deercreative@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>{{$tampilan->tampilan()->email}}</a>
                            <!-- <p><i class="fa fa-clock-o" aria-hidden="true"></i> </p> -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Copwrite Area -->
    <div class="copywrite-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center flex-wrap">
                <!-- Copywrite Text -->
                <div class="col-12 col-md-6">
                    <div class="copywrite-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <a href="#" target="_blank">Vlntr</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                    </div>
                </div>

                <!-- Footer Social Icon -->
                <div class="col-12 col-md-6">
                    <div class="footer-social-icon">
                        <a target="_blank" href="{{$tampilan->tampilan()->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a target="_blank" href="{{$tampilan->tampilan()->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a target="_blank" href="{{$tampilan->tampilan()->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <!-- <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->