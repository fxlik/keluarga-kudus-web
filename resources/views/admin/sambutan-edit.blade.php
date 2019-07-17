@extends('admin._partial.layout')
@section('breadcrumb')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{route('pengurus.beranda')}}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kelola Sambutan</li>
</ol>
@endsection
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-calendar"></i>
        Kelola Sambutan
    </div>
    <div class="card-body">
        <div style="margin-bottom:15px;">
            <a class="btn btn-xs btn-danger" href="{{route('pengurus.sambutan')}}"><i class=" fas fa-arrow-left"></i> Kembali</a>
        </div>
        <form action="{{route('pengurus.sambutanUpdate')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
              <textarea id="summernote" name="sambutaja">{{$sambutan->sambutan}}</textarea>
          </div>
          <button style="width:100px;" class="btn btn-primary btn-block" onclick="return confirm('Update Informasi Sambutan?')" type="submit">Update</button>
      </form>
    </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
        height: 500,
        placeholder: ' *'
    });
  });
</script>
@endsection