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
        <div style="margin-bottom:15px;">
            <a class="btn btn-xs btn-danger" href="{{route('pengurus.berita')}}"><i class=" fas fa-arrow-left"></i> Kembali</a>
        </div>
        <form action="{{route('pengurus.beritaUpdate')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{$berita->id}}" name="berita_id">
            <div class="form-group">
                <div class="form-label-group">
                    <input name="image" type="file" id="image" class="form-control" placeholder="Thumbnail Berita">
                    <label for="image">Thumbnail (boleh kosong)</label>
                </div>
            </div>
            <div class="form-group">
                <select name="kategori" id="kategori" class="form-control">
                    <option value="pengumuman mingguan">Pengumuman Mingguan</option>
                    <option value="perkawinan">Perkawinan</option>
                    <option value="berita">Berita</option>
                </select>
                <span style="color:darkgray; font-size:13px;"><i>*Pilih Kategori Berita/Pengumuman</i></span>
                {{-- <label for="kategori">Kategori Berita *</label> --}}
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="{{$berita->judul}}" name="judul" type="text" id="judul" class="form-control" placeholder="Judul Berita" required="required" autofocus="autofocus">
                    <label for="judul">Judul Berita</label>
                </div>
            </div>
    
            <div class="form-group">
                <textarea id="summernote" name="editordata">{{$berita->deskripsi}}</textarea>
            </div>
            <button style="width:100px;" class="btn btn-primary btn-block" type="submit" onclick="return confirm('Update Berita?')">Publish</button>
    
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