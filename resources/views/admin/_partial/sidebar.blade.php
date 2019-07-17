<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="{{set_active('pengurus.beranda')}} nav-item">
      <a class="nav-link" href="{{route('pengurus.beranda')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="{{set_active(['pengurus.berita', 'pengurus.beritaCreate', 'pengurus.beritaEdit'])}} nav-item">
      <a class="nav-link" href="{{route('pengurus.berita')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Berita</span></a>
    </li>
    <li class="{{set_active(['pengurus.event', 'pengurus.eventCreate', 'pengurus.eventEdit'])}} nav-item">
      <a class="nav-link" href="{{route('pengurus.event')}}">
        <i class="fas fa-fw fa-calendar"></i>
        <span>Event</span></a>
    </li>
    <li class="{{set_active('pengurus.pesan')}} nav-item">
      <a class="nav-link" href="{{route('pengurus.pesan')}}">
        <i class="fas fa-fw fa-envelope"></i>
        <span>Pesan</span></a>
    </li>
    <li class="{{set_active('pengurus.organisasi')}} nav-item">
      <a class="nav-link" href="{{route('pengurus.organisasi')}}">
      <i class="fas fa-fw fa-user"></i>
      <span>Organisasi</span></a>
    </li>
    <li class="{{set_active(['pengurus.galeriCreate', 'pengurus.galeri', 'pengurus.sliderCreate', 'pengurus.slider', 'pengurus.editTampilanUmum', 'pengurus.tampilanUmum', 'pengurus.sejarahEdit', 'pengurus.sejarahUpdate', 'pengurus.sambutan', 'pengurus.sambutanEdit'])}} nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pengaturan</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Pengaturan Tampilan</h6>
        <a class="dropdown-item {{set_active(['pengurus.editTampilanUmum','pengurus.tampilanUmum'])}}" href="{{route('pengurus.tampilanUmum')}}">Informasi Umum</a>
        <a class="dropdown-item {{set_active(['pengurus.slider', 'pengurus.sliderCreate'])}}" href="{{route('pengurus.slider')}}">Slider</a>
        <a class="dropdown-item {{set_active(['pengurus.galeriCreate','pengurus.galeri'])}}" href="{{route('pengurus.galeri')}}">Galeri</a>
        <a class="dropdown-item {{set_active(['pengurus.sejarahEdit', 'pengurus.sejarahUpdate'])}}" href="{{route('pengurus.sejarahEdit')}}">Sejarah</a>
        <a class="dropdown-item {{set_active(['pengurus.sambutan', 'pengurus.sambutanEdit'])}}" href="{{route('pengurus.sambutan')}}">Sambutan</a>
        
        <a class="dropdown-item" href="#"><i>Etc. Coming soon</i></a>
        
      </div>
    </li>
    
  </ul>