@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Validasi Usulan</li>
</ol>
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-check"></i>
        <b>Validasi Usulan Pelayanan</b>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="content-group">
                    <div class="alert alert-success">
                        <ul>
                            <li>Silakan lakukan validasi usulan pelayanan oleh Wilayah di halaman ini</li>
                        </ul>      
                    </div>
                    <div class="table-responsive">
                        <table id="himehime" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Status</th>
                                    <th>Perihal</th>
                                    <th>Wilayah Pengaju</th>
                                    <th>Tujuan</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>.</th>
                                    <th>Perihal</th>
                                    <th>Wilayah Pengaju</th>
                                    <th>Tujuan</th>
                                    <th>Detail</th>
                                    <th>Action</th>
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
                                        {{$rose->wilayah->nama}}
                                    </td>
                                    <td>
                                        {{$rose->organisasi->nama}} <br>
                                        <span style="color:darkgray; font-style:italic; font-size:15px;"><b>{{$rose->seksi->nama}}</b></span>
                                    </td>
                                    <td>
                                        {{-- <button data-idden="{{$rose->perihal}}" type="button" class="detailin btn btn-sm btn-primary" data-toggle="modal" >Detail</button> --}}
                                        <a data-tanggapan="{{$rose->tanggapan}}" data-detail="{{$rose->detail}}" data-iden="{{$rose->perihal}}" href="#" class="detailin btn btn-sm btn-primary"> Detail</a>
                                    </td>
                                    <td>
                                        <a data-id="{{$rose->id}}" data-perihal="{{$rose->perihal}}" href="#" class="verifikasiin btn btn-sm btn-primary"><i class="fas fa-check"></i> Verifikasi</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Large modal -->

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

<!-- Modal -->
<div id="verif" class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formp1" data-toggle="validator" action="" method="POST" role="form">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6>Verifikasi Usulan Pelayanan</h6>
                </div>
        
                <div class="modal-body">
                    <input type="hidden" id="usulan_id" name="usulan_id">
                    <div class="form-group">
                        <select class="form-control" name="status" id="status" onchange="yap()">
                            <option value="">---- Pilih Aksi -----</option>
                            <option value="1">Setujui</option>
                            <option value="2">Tolak</option>
                        </select>
                        <span style="color:cornflowerblue; font-size:13px;"><i>* VERIFIKASI?</i></span>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input name="tanggapan" type="text" id="tanggapan" class="form-control" placeholder="Tanggapan (Opsional) *" autofocus="autofocus">
                            <label for="tanggapan">Tanggapan (Opsional) *</label>
                        </div>
                        <span style="color:cornflowerblue; font-size:13px;"><i>** Tanggapan (Opsional)</i></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-xs btn-danger" data-dismiss="modal"><i class="icon-cross3"></i> Batal</button>
                    <button type="submit" id="verifinya" disabled="disabled" class="btn-xs btn-success ubah"><i class="icon-check"></i> Simpan</button>
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
  $('#himehime').DataTable();
});

$('.detailin').click(function (e) {
    $('#sayaya').text('Perihal: '+$(this).data('iden'));
    $('#detailan').html($(this).data('detail'));
    $('#tanggapin').html($(this).data('tanggapan'));
    $('#modalin').modal('show');
    
});

$('.verifikasiin').click(function (e) {
    $('#usulan_id').val($(this).data('id'));
    $('#formp1').attr('action', '{{url('pengurus/validasi-usulan/post')}}');
    $('#verif').modal('show');
    
});

function yap(){
    if (document.getElementById('status').options.length != 0) {
        document.getElementById('verifinya').disabled = false;
    }
}
</script> 
@endsection