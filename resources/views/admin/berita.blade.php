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
        Kelola Berita
    </div>
    <div class="card-body">
        <div style="margin-bottom:15px;">
            <a class="btn btn-xs btn-primary" href="{{route('pengurus.beritaCreate')}}"><i class=" fas fa-plus-square"></i> Berita Baru</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>status</th>
                        <th>Judul Berita</th>
                        <th>.</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>status</th>
                        <th>Judul Berita</th>
                        <th>.</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($berita as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        @if ($item->status == 1)
                        <span class="badge badge-success"><i class="fas fa-check-circle"></i> published</span>
                        @else
                        <span class="badge badge-secondary"><i class="fas fa-clock"></i> Pending</span>
                        @endif
                    </td>
                    <td>
                        {{$item->judul}} <br>
                        <span style="color:darkgray; font-size:13px;"> Dipost oleh: <i>{{$item->user->name}}</i>, <i>pada: {{ \Carbon\Carbon::parse($item->created_at)->format('M d Y')}}</i> // Kategori: <i>{{$item->kategori}}</i></span>                        
                    </td>
                    <td>
                        @if (Auth::user()->is_verified == 1)
                            @if ($item->status == 0)
                            <a data-id="{{$item->id}}" data-judul="{{$item->judul}}" href="#" class="verifikasiin btn btn-sm btn-primary"><i class="fas fa-check"></i> Publish</a>
                            @endif
                        @endif
                        <a class="btn btn-sm btn-warning" href="{{route('pengurus.beritaEdit', $item->id)}}"><i class="fas fa-book"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" href="{{route('pengurus.beritaDelete', $item->id)}}" onclick="return confirm('Delete Berita?')"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                    
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

<div id="verif" class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formp1" data-toggle="validator" action="" method="POST" role="form">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6>Verifikasi Berita</h6>
                </div>
        
                <div class="modal-body">
                    <input type="hidden" id="berita_id" name="berita_id">
                    <h5><p id="judulanan"></p></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-xs btn-danger" data-dismiss="modal"><i class="icon-cross3"></i> Batal</button>
                    <button type="submit" id="verifinya" class="btn-xs btn-success ubah"><i class="icon-check"></i> Simpan</button>
                </div>
            </form>
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

$('.verifikasiin').click(function (e) {
    $('#berita_id').val($(this).data('id'));
    $('#judulanan').text('Publish berita dengan judul: '+$(this).data('judul'));
    $('#formp1').attr('action', '{{url('pengurus/berita/publish')}}');
    $('#verif').modal('show');
    
});
</script>
@endsection