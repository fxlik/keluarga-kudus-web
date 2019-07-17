@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('pengurus.beranda')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('pengurus.event')}}">Kelola Event</a>
    </li>
    <li class="breadcrumb-item active">Publish Event Baru</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-calendar"></i>
        Post Event Baru
    </div>
    <div class="card-body">
        <div style="margin-bottom:15px;">
            <a class="btn btn-xs btn-danger" href="{{route('pengurus.event')}}"><i class=" fas fa-arrow-left"></i> Kembali</a>
        </div>
        <form action="{{route('pengurus.eventPost')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-label-group">
                    <input name="image" type="file" id="image" class="form-control" placeholder="Thumbnail Berita">
                    <label for="image">Thumbnail (boleh kosong)</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="judul" type="text" id="judul" class="form-control" placeholder="Nama Event *" required="required" autofocus="autofocus">
                    <label for="judul">Nama Event *</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="tempat" type="text" id="tempat" class="form-control" placeholder="Tempat pelaksanaan *" required="required">
                    <label for="tempat">Tempat Pelaksanaan *</label>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker1" placeholder="Pilih tempat & waktu mulai *" required="required">
                </div>
                <span style="color:darkgray; font-size:13px;"><i>*klik icon kalender untuk pilih tanggal & waktu</i></span>
            </div>
            <div class="form-group">
                <textarea id="summernote" name="editordata" required></textarea>
            </div>
            <button style="width:100px;" class="btn btn-primary btn-block" onclick="return confirm('Publish event ini?')" type="submit">Publish</button>
        </form>
    </div>
</div>
@endsection

@section('script')
{{-- <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script> --}}
<script type="text/javascript">
$(function () {
    $('#datetimepicker1').datetimepicker({
        sideBySide: true, 
        debug: true,
        // format: 'YY-MM-DD HH:MM'
    });
});
</script>
<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 500,
        placeholder: 'Deskripsi Event *'
    });
});
</script>
@endsection