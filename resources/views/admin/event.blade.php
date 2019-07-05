@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kelola Event</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-calendar"></i>
        Kelola Event
    </div>
    <div class="card-body">
        <div style="margin-bottom:15px;">
            <a class="btn btn-xs btn-primary" href="#"><i class=" fas fa-plus-square"></i> Event Baru</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Event</th>
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
                    @foreach ($event as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{$item->judul}} <br>
                    <i>{{ \Carbon\Carbon::parse($item->tanggal)->format('M d Y')}}, {{ \Carbon\Carbon::parse($item->tanggal)->format('H:i A')}} At {{$item->tempat}}</i>
                    </td>
                    <td>
                        <a class="btn btn-xxs btn-warning" href="#"><i class="fas fa-book"></i> Edit</a>
                        <a class="btn btn-xxs btn-danger" href="#"><i class="fas fa-trash"></i> Hapus</a>
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