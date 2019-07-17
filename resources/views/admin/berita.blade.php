@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kelola Berita</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Kelola Berita
    </div>
    <div class="card-body">
        <div style="margin-bottom:15px;">
            <a class="btn btn-xs btn-primary" href="{{route('pengurus.beritaCreate')}}"><i class=" fas fa-plus-square"></i> Berita Baru</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Berita</th>
                        <th>.</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Judul Berita</th>
                        <th>.</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($berita as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{$item->judul}} <br>
                        <span style="color:darkgray; font-size:13px;"> Dipost pada: <i>{{ \Carbon\Carbon::parse($item->created_at)->format('M d Y')}}</i> // Kategori: <i>{{$item->kategori}}</i></span>                        
                    </td>
                    <td>
                        <a class="btn btn-xxs btn-warning" href="{{route('pengurus.beritaEdit', $item->id)}}"><i class="fas fa-book"></i> Edit</a>
                        <a class="btn btn-xxs btn-danger" href="{{route('pengurus.beritaDelete', $item->id)}}" onclick="return confirm('Delete Berita?')"><i class="fas fa-trash"></i> Hapus</a>
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