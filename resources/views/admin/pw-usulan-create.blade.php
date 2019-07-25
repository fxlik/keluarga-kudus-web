@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('pw.beranda')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('pw.usulan')}}">Usulan Pelayanan</a>
    </li>
    <li class="breadcrumb-item active">Usulan Baru</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-chart-fire"></i>
        Buat Usulan Baru
    </div>
    <div class="card-body">
        <div style="margin-bottom:15px;">
            <a class="btn btn-xs btn-danger" href="{{route('pw.usulan')}}"><i class=" fas fa-arrow-left"></i> Kembali</a>
        </div>
        <form action="{{route('pw.usulanPost')}}" method="post" enctype="multipart/form-data">
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
            {{-- <div class="form-group">
                <div class="form-label-group">
                    <input name="image" type="file" id="image" class="form-control" placeholder="File Pendukung">
                    <label for="image">File Pendukung</label>
                </div>
            </div> --}}
            <div class="form-group">
                <label for="seksi">Bidang:</label>
                <select class="form-control" name="organisasi" id="organisasi">
                    <option value="" disable="true" selected="true">===== Pilih Bidang =====</option>
                    @foreach($organisasi as $key => $data)
                    
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                </select>
                <span style="color:cornflowerblue; font-size:13px;"><i>* Pilih bidang tujuan usulan</i></span><br>
            </div>
            <div class="form-group">
                <label for="seksi">Seksi/Subseksi:</label>
                <select class="form-control" name="seksi" id="seksi">
                    <option value="" disable="true" selected="true">===== Pilih Seksi/Subseksi =====</option>
                </select>
                <span style="color:cornflowerblue; font-size:13px;"><i>* Pilih seksi/subseksi tujuan usulan</i></span><br>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="perihal" type="text" id="perihal" class="form-control" placeholder="Perihal *" autofocus="autofocus">
                    <label for="perihal">Perihal *</label>
                </div>
            </div>
    
            <div class="form-group">
                <textarea id="summernote" name="editordata"></textarea>
            </div>

            <input type="hidden" name="wilayah_id" value="{{$user_data->wilayah_id}}">
            <input type="hidden" name="user_id" value="{{$user_data->id}}">
            <button style="width:100px;" class="btn btn-primary btn-block" onclick="return confirm('Buat usulan?')" type="submit">Submit</button>
    
        </form>   
    </div>       
</div>
@endsection

@section('script')

<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 500,
        placeholder: 'Isi Usulan Pelayanan *'
    });
});

$('#organisasi').on('change', function(e){
    console.log(e);
    var organisasi_id = e.target.value;
    $.get('{{url('pengurus/json-seksi')}}?organisasi_id=' + organisasi_id,function(data) {
        console.log(data);
        $('#seksi').empty();
        $('#seksi').append('<option value="" disable="true" selected="true">===== Pilih Seksi/Subseksi =====</option>');
        $.each(data, function(index, seksiObj){
            $('#seksi').append('<option value="'+ seksiObj.id +'">'+ seksiObj.nama +'</option>');
        });
    });
});

$('#kirim').click(function (e) {
    // var kaka = $('#kk').text();
    var kaka = $('#seksi').find("option:selected").text();
    // $("#cece").attr('value', kaka);
    $('#seksi').value(kaka);
});
</script>
@endsection