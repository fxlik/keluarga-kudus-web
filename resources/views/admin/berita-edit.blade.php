@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('pengurus.beranda')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('pengurus.berita')}}">Kelola Berita</a>
    </li>
    <li class="breadcrumb-item active">Tulis Berita Baru</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Post Berita Baru
    </div>
    <div class="card-body">
        <form action="{{route('pengurus.beritaUpdate')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{$berita->id}}" name="berita_id">
            <div class="form-group">
                <div class="form-label-group">
                    <input value="{{$berita->judul}}" name="judul" type="text" id="judul" class="form-control" placeholder="Judul Berita" required="required" autofocus="autofocus">
                    <label for="judul">Judul Berita</label>
                </div>
            </div>
    
            <div class="form-group">
                <textarea id="summernote" name="editordata">{{$berita->deskripsi}}</textarea>
            </div>
            <button style="width:100px;" class="btn btn-primary btn-block" type="submit">Publish</button>
    
        </form>   
    </div>       
</div>
@endsection

@section('script')

<script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 500,
                placeholder: 'What\'s going on?'
            });
        });
      </script>
@endsection