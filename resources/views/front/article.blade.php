

@extends('front.layouts.master')
@section('title','Makaleler')
@section('front-cs')
    <style>
        .flex-1
        {
            display: none !important;
        }
        .text-sm
        {
            text-align: center !important;
        }

        svg
        {
            width: 20px !important;
            height: 20px !important;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        @if(count($articles)>0)
            <h1 class="display-3 mt-2 mb-3">@yield('title')</h1>
            <div class="row my-3 ">
                <div class="col-md-9">
                    @foreach($articles as $article)
                        <div class="row my-3 border-bottom border-primary mt-4 py-1">
                            <div class="col-md-6 px-0">
                                <img class="card-img-top rounded-0" src="{{$article->img}}">
                            </div>
                            <div class="col-md-6">

                                <p style="text-indent:0px !important; display: block !important;">
                                    <span class="float-left font-italic text-muted">Yazar: {{$article->getWriters->name}}</span>
                                    <span class="float-right font-italic text-muted">{{$article->created_at->diffForHumans()}}</span>
                                </p><br>
                                <h4 class="card-title">{{$article->title}}</h4>
                                <p class="card-text">{!! Str::limit($article->article,75) !!}</p>
                                <span class="float-left font-italic text-muted">Kategori: {{$article->getCategory->name}}</span>

                                <a href="{{route('article.detail',$article->slug)}}" class="btn btn-outline-primary rounded-0 float-right">
                                    Devamını Oku
                                </a>

                            </div>
                        </div>
                    @endforeach
                    {{$articles->links()}}
                </div>
                <div class="col-md-3">
                    <p>sadaslksaşldkşas</p>
                </div>
            </div>
        @else
            <div class="alert alert-danger my-5">
                <h3 class="text-center">Yayımlanmış makale bulunamamıştır</h3>
            </div>
        @endif
    </div>

    <hr>
@endsection
