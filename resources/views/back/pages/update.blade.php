
@extends('back.layouts.master')
@section('title','Yeni Yazı')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Yeni Yazı</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{route('admin.yazilar.update',$page->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Yazı Başlığı</label>
                    <input value="{{$page->hood}}" type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Katagori</label>
                    <select name="category" class="form-control" required>
                        <option value="">Seçim Yapın</option>
                        @foreach($categories as $category)
                            <option @if ($category->id == $page->catagory_id) selected @endif  value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Görsel</label> <br>
                    <img src="{{asset($page->img)}}" class="rounded mb-2" width="200">
                    <input type="file" name="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <label>İçerik</label>
                    <textarea id="editor" name="conten" class="form-control" rows="5">
                        {{$page->article}}
                    </textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('cs')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote(
                {
                    'height':400
                }
            );
        });
    </script>
@endsection
