<!-- Menu -->
<nav class="classy-navbar justify-content-between" id="croseNav">

    <!-- Nav brand -->
    <a href="{{route('client.beranda')}}" class="nav-brand"><img src="{{asset('client/img/core-img')}}/{{$tampilan->tampilan()->logo1}}" alt=""></a>

    <!-- Navbar Toggler -->
    <div class="classy-navbar-toggler">
        <span class="navbarToggler"><span></span><span></span><span></span></span>
    </div>

    <!-- Menu -->
    <div class="classy-menu">

        <!-- close btn -->
        <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
        </div>

        <!-- Nav Start -->
        <div class="classynav">
            <ul>
                <li><a href="{{route('client.beranda')}}">Beranda</a></li>
                <li><a href="#">Profil</a>
                    <ul class="dropdown">
                        <li><a href="{{route('client.sambutan')}}">Sambutan</a></li>
                        <li><a href="{{route('client.sejarah')}}">Sejarah</a></li>
                        <li><a href="#">Wilayah</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Berita & Pengumuman</a>
                    <ul class="dropdown">
                        <li><a href="{{route('client.beritaMingguan')}}">Mingguan</a></li>
                        <li><a href="{{route('client.beritaKawinan')}}">Perkawinan</a></li>
                        <li><a href="{{route('client.berita')}}">Berita</a></li>
                    </ul>
                </li>
                {{-- <li><a href="{{route('client.berita')}}">Berita</a></li> --}}
                <li><a href="{{route('client.event')}}">Event Gereja</a></li>
                <li><a href="{{route('client.pelayan')}}">Pelayan Wilayah</a></li>
                <li><a href="{{route('client.kontak')}}">Contact</a></li>
            </ul>

            <!-- Search Button -->
            <div id="header-search"><i class="fa fa-search" aria-hidden="true"></i></div>

        </div>
        <!-- Nav End -->
    </div>
</nav>