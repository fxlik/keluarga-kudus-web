<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="{{route('pengurus.beranda')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('pengurus.berita')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Berita</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('pengurus.event')}}">
        <i class="fas fa-fw fa-calendar"></i>
        <span>Event</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('pengurus.pesan')}}">
        <i class="fas fa-fw fa-envelope"></i>
        <span>Pesan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('pengurus.organisasi')}}">
      <i class="fas fa-fw fa-user"></i>
      <span>Organisasi</span></a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pengaturan</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Pengaturan Tampilan</h6>
        <a class="dropdown-item" href="#">Logo</a>
        <a class="dropdown-item" href="#">Slider</a>
        <a class="dropdown-item" href="#">Galeri</a>
        <a class="dropdown-item" href="#">Sejarah</a>
        <a class="dropdown-item" href="#">Sambutan</a>
        <a class="dropdown-item" href="#">Alamat</a>
        <a class="dropdown-item" href="#"><i>Etc. Coming soon</i></a>
        
      </div>
    </li>
    
  </ul>