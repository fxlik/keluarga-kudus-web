@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Usulan Pelayanan</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    @if (Auth::user()->is_verified == 10 || Auth::user()->is_verified == 1 || Auth::user()->is_verified == 0)
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
        <i class="fas fa-chart-fire"></i>
        Usulan
    </div>
    <div class="card-body">
        <div style="margin-bottom:15px;">
            <a class="btn btn-xs btn-primary" href="{{route('pw.usulanCreate')}}"><i class=" fas fa-plus-square"></i> Buat Usulan</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>.</th>
                        <th>Perihal</th>
                        <th>Tujuan</th>
                        <th>Detail</th>
                        <th>.</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Perihal</th>
                        <th>Tujuan</th>
                        <th>Detail</th>
                        <th>.</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($usulan as $rose)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if ($rose->status == 1)
                            <span class="badge badge-success"><i class="fas fa-check-circle"></i> verified</span>
                            @else
                            <span class="badge badge-secondary"><i class="fas fa-clock"></i> Pending</span>
                            @endif
                        </td>
                        <td>
                            {{$rose->perihal}} <br>
                            <span style="color:darkgray; font-size:13px;"> Diajukan pada: <i>{{ \Carbon\Carbon::parse($rose->created_at)->format('M d Y')}}</i></span>
                        </td>
                        <td>
                            {{$rose->organisasi->nama}} <br>
                            <span style="color:darkgray; font-style:italic; font-size:15px;"><b>{{$rose->seksi->nama}}</b></span>
                        </td>
                        <td>
                            <a data-tanggapan="{{$rose->tanggapan}}" data-detail="{{$rose->detail}}" data-iden="{{$rose->perihal}}" href="#" class="detailin btn btn-sm btn-primary"> Detail</a>
                        </td>
                        <td>
                            @if ($rose->status == 1)
                            <button class="btn btn-sm btn-danger" disabled="disabled"><i class="fas fa-trash"></i> Hapus</button>
                            @else
                            <a class="btn btn-sm btn-danger" href="{{route('pw.usulanDelete', $rose->id)}}" onclick="return confirm('Hapus Usulan Pelayanan? Semua informasi Usulan Pelayanan akan dihapus.')"><i class="fas fa-trash"></i> Hapus</a>                                
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

<div id="modalin" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"> <p style="font-style:italic" id="sayaya"></p></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-warning">
                        <p style="font-style:italic; font-size:15px;">Detail Usulan:</p>
                        <div id="detailan">

                        </div>
                      </div>
                      <div class="alert alert-success">
                        <p style="font-style:italic; font-size:15px;">Tanggapan Admin:</p>
                        <div id="tanggapin">

                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
          </div>
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

$('.detailin').click(function (e) {
    $('#sayaya').text('Perihal: '+$(this).data('iden'));
    $('#detailan').html($(this).data('detail'));
    $('#tanggapin').html($(this).data('tanggapan'));
    $('#modalin').modal('show');
});
</script>
@endsection