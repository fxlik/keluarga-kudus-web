@extends('client.layout')
@section('breadcrump')
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('client.beranda')}}"><i class="fa fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pelayan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="events-area section-padding-100">
    <div class="container">
        <div class="row">
            <!-- Events Title -->
            <div class="col-12">
                <h5>Daftar Usulan Pelayanan</h5>
                <div class="table-responsive">
                    <table id="yuna" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Status</th>
                                <th>Perihal</th>
                                <th>Wilayah Pengaju</th>
                                <th>Tujuan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>.</th>
                                <th>Perihal</th>
                                <th>Wilayah Pengaju</th>
                                <th>Tujuan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($usulan as $rose)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    @if ($rose->status == 1)
                                    <span class="badge badge-success">verified</span>
                                    @else
                                    <span class="badge badge-secondary">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    {{$rose->perihal}} <br>
                                    <span style="color:darkgray; font-size:13px;"> Diajukan pada: <i>{{ \Carbon\Carbon::parse($rose->created_at)->format('M d Y')}}</i></span>
                                </td>
                                <td>
                                    {{$rose->wilayah->nama}}
                                </td>
                                <td>
                                    {{$rose->organisasi->nama}} <br>
                                    <span style="color:darkgray; font-style:italic; font-size:15px;"><b>{{$rose->seksi->nama}}</b></span>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-area">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{ $usulan->render("pagination::bootstrap-4") }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
  $('#yuna').DataTable();
});
</script>
@endsection