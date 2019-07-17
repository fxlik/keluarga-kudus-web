@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kelola Slider</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Kelola Slider
    </div>
    <div class="card-body">
        <div style="margin-bottom:15px;">
            @if ($jumlahSlider <= 4)
            <a class="btn btn-xs btn-primary" href="{{route('pengurus.sliderCreate')}}"><i class=" fas fa-plus-square"></i> Tambah Slider</a>                
            @else
            <a class="btn btn-xs btn-primary disabled" title="Max. 5 Slider" href="#" ><i class=" fas fa-plus-square"></i> Tambah Slider</a>                
            @endif
        </div>
        <div class="table-responsive">
            @if ($jumlahSlider > 4)
            <span style="color:cornflowerblue; font-size:13px;"><i>*Max. 5 Slider untuk ditampilkan!</i></span><br>                
            @endif
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>.</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>.</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($slider as $item)
                <tr>
                    <td style="width:5%;">{{$loop->iteration}}</td>
                    <td style="width:23%">
                        <img style="width:150px; height:auto;" src="{{asset('client/img/bg-img')}}/{{$item->foto}}" alt="slider-photo">
                    </td>
                    <td style="width:20%;">{{$item->judul}}</td>
                    <td style="width:32%;">{{$item->deskripsi}}</td>
                    <td style="width:20%;">
                        <a class="btn btn-xxs btn-warning" href="{{route('pengurus.sliderEdit', $item->id)}}"><i class="fas fa-book"></i> Edit</a>
                        @if ($jumlahSlider>=2)
                        <a class="btn btn-xxs btn-danger" href="{{route('pengurus.sliderDelete', $item->id)}}" onclick="return confirm('Delete slider ini?')"><i class="fas fa-trash"></i> Hapus</a>
                        @endif
                    </td>
                    
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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