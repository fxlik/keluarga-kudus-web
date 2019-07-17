@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kelola Pesan</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-envelope"></i>
        Pesan Masuk
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>HP</th>
                        <th>Pesan</th>
                        <th>.</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>HP</th>
                        <th>Pesan</th>
                        <th>.</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($pesan as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->hp}}</td>
                    <td>{{$item->pesan}}</td>
                    <td>
                    <a class="btn btn-xxs btn-danger" href="{{route('pengurus.pesanDelete', $item->id)}}" onclick="return confirm('Hapus pesan ini?')"><i class="fas fa-trash"></i> Hapus</a>
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