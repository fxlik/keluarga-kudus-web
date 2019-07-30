@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kelola Admin</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    @if (Auth::user()->is_verified == 10)
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
        Kelola Admin
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="alert alert-info">
                    <h5>Username:<b> {{Auth::user()->name}}</b></h5>
                    <form action="{{route('pengurus.userGantiPassword')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <input type="hidden" name="userganti_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input name="passwordin" type="password" id="passwordin" class="form-control" placeholder="Password Baru">
                                <label for="passwordin">Password Baru</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" onclick="lihatPassword()" class="styled">
                                Lihat Password
                              </label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" onclick="return confirm('ubah password?')" type="submit">Update Password</button>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                @if (Auth::user()->is_verified == 1)
                <div style="margin-bottom:15px;">
                    <a class="btn btn-xs btn-primary" href="{{route('pengurus.userCreate')}}"><i class=" fas fa-plus-square"></i> Tambah User</a>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>.</th>
                                <th>Nama</th>
                                <th>email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>.</th>
                                <th>Nama</th>
                                <th>email</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($user as $nigga)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                @if ($nigga->is_verified == 1)
                                <span class="badge badge-primary"><i class="fas fa-gavel"></i> Controller</span>
                                @elseif($nigga->is_verified == 0)
                                <span class="badge badge-success"><i class="fas fa-user-circle"></i> Admin Berita</span>
                                @elseif($nigga->is_verified == 11)
                                <span class="badge badge-warning"><i class="fas fa-flag"></i> Admin Wilayah</span>
                                @else
                                <span class="badge badge-danger"><i class="fas fa-minus-circle"></i> non-aktif</span>
                                @endif
                            </td>
                            <td>{{$nigga->name}}</td>
                            <td>{{$nigga->email}}</td>
                            <td>
                                @if ($nigga->is_verified != 1)
                                    <a href="{{route('pengurus.userDelete', $nigga->id)}}" onclick="return confirm('yakin nih? Semua data pengguna akan terhapus.')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus Akun</a>
                                    <a href="#" class=" resetin btn btn-sm btn-warning" id="resetin" data-id="{{$nigga->id}}" data-name="{{$nigga->name}}"> <i class="fas fa-cogs"></i> Reset Password</a>
                                @endif
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <div>
                        Silakan update password anda menggunakan form di samping.
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>

<div id="reset" class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formp1" data-toggle="validator" action="" method="POST" role="form">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h6>Reset Password</h6>
                </div>
        
                <div class="modal-body">
                    <p>Password pengguna akan di-reset, password baru pengguna adalah sama dengan username pengguna.</p>
                    <p id="rerere"></p>
                    <input type="hidden" id="user_id" name="user_id">
                    <input type="hidden" id="pass" name="pass">
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

$('.resetin').click(function (e) {
    
    // $('#detailan').html($(this).data('detail'));
    // $('#tanggapin').html($(this).data('tanggapan'));
    $('#reset').modal('show');
    
});

$('.resetin').click(function (e) {
    $('#user_id').val($(this).data('id'));
    $('#pass').val($(this).data('name'));
    $('#rerere').text('Password akan di-reset ke: '+$(this).data('name'));
    $('#formp1').attr('action', '{{url('pengurus/kelola-pengguna/update')}}');
    $('#verif').modal('show');
    
});


function lihatPassword() {
	var x = document.getElementById("passwordin");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}
</script>
@endsection