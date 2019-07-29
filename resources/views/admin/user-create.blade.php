@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('pengurus.beranda')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('pengurus.userIndex')}}">Kelola Admin</a>
    </li>
    <li class="breadcrumb-item active">Tambah Admin</li>
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
        Tambah Admin Baru
    </div>
    <div class="card-body">
        <div style="margin-bottom:15px;">
            <a class="btn btn-xs btn-danger" href="{{route('pengurus.userIndex')}}"><i class=" fas fa-arrow-left"></i> Kembali</a>
        </div>
        <form action="{{route('pengurus.userPost')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
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

            
            <div class="form-group">
                <div class="form-label-group">
                    <input name="name" type="text" id="name" value="{{old('name')}}" class="form-control" placeholder="Username" autofocus="autofocus">
                    <label for="name">Username</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="email" type="text" id="email" value="{{old('email')}}" class="form-control" placeholder="your@email.com">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="password" type="password" id="password" class="form-control" placeholder="Password">
                    <label for="password">Password</label>
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
            <div class="form-group">
                <select name="kategori" id="kategori" class="form-control">
                    <option value="0">Admin Berita</option>
                    <option value="1">Controller</option>
                    <option value="11">Admin Wilayah</option>
                </select>
                <span style="color:brown; font-size:13px;"><i>*Pilih Role</i></span>
                {{-- <label for="kategori">Kategori Berita *</label> --}}
            </div>

            <div class="form-group" id="hime" style="display:none;">
                <select name="namawilayah" id="namawilayah" class="form-control">

                </select>
                <span style="color:brown; font-size:13px;"><i>*Pilih Wilayah</i></span>
            </div>
            
            <button style="width:100px;" class="btn btn-primary btn-block" onclick="return confirm('Tambah User?')" type="submit">Publish</button>
    
        </form>   
    </div>
    @endif     
</div>
@endsection

@section('script')

<script>
$('#kategori').on('change', function(e){
    if ($(this).val() == 11) {
        show(document.getElementById('hime'));
        function show(elements, specifiedDisplay){
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = specifiedDisplay || 'block';
            }
        }
        $.get('{{url('pengurus/json-wilayah')}}', function(data){
            console.log(data);
            $('#namawilayah').empty();
            // $('#namawilayah').append('<option value="" disable="true" selected="true">===== Pilih Seksi/Subseksi =====</option>');
            $.each(data, function(index, seksiObj){
                $('#namawilayah').append('<option value="'+ seksiObj.id +'">'+ seksiObj.nama +'</option>');
            });
        });
    }else{
        hide(document.getElementById('hime'));
        function hide (elements) {
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = 'none';
            }
        }
        $('#namawilayah').empty();
    }
});

function lihatPassword() {
	var x = document.getElementById("password");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}
</script>
@endsection