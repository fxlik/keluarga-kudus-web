@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kelola Galeri</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    @if (Auth::user()->is_verified == 10 || Auth::user()->is_verified == 11)
    <div class="card-header">
            <i class="fas fa-exclamation-circle"></i>
            USER TIDAK PUNYA AKSES
        </div>
        <div class="card-body">
          <div class="alert alert-danger">
              <h5><b>ANDA TIDAK PUNYA AKSES KE HALAMAN INI</b></h5>
              Akun anda tidak mempunyai akses pada halaman ini, silakan kembali ke <a href="{{route('pengurus.beranda')}}">Beranda.</a>
          </div>
        </div>
    @else
    <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Kelola Galeri
    </div>
    <div class="card-body">
        <div style="margin-bottom:15px;">
            <a class="btn btn-xs btn-primary" href="{{route('pengurus.galeriCreate')}}"><i class=" fas fa-plus-square"></i> Tambah Galeri</a>
        </div>
        <div class="table-responsive">
            <span style="color:cornflowerblue; font-size:13px;"><i>*10 Foto teratas akan ditampilkan di halaman beranda!</i></span><br>                
            
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Caption</th>
                        <th>.</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Caption</th>
                        <th>.</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($galeri as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img style="width:150px; height:auto;" src="{{asset('client/img/bg-img')}}/{{$item->foto}}" alt="slider-photo">
                        </td>
                        <td>{{$item->caption}}</td>
                        <td>
                            @if ($hitungGaleri>1)
                            <a class="btn btn-xxs btn-danger" href="{{route('pengurus.galeriDelete', $item->id)}}" onclick="return confirm('Hapus foto ini dari galeri?')"><i class="fas fa-trash"></i> Hapus</a>                                
                            @endif
                        </td>
                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection
@section('script')
<script>
// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
@endsection