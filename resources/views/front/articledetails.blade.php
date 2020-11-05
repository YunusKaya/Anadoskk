

@extends('front.layouts.master')
@section('title','Makaleler')
@section('front-cs')
    <style>
        .fa-thumbs-up
        {
            border: 2px solid #6c757d;
            color: #6c757d;
            border-radius: 50%;
            font-size: 15px;
            cursor: pointer;

        }
        .fa-thumbs-down
        {
            border: 2px solid #6c757d;
            color: #6c757d;
            border-radius: 50%;
            font-size: 15px;
            cursor: pointer;

        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row mt-5 mb-3">
            <div class="col-md-9">
               <img src="{{$article->img}}" class="img-fluid" style="width: 100%">
                <div class="d-block py-1" style="font-size: 16px ">
                    <span class="float-left font-italic text-muted pr-4">Kategori: {{$article->getCategory->name}}</span>
                    <span class="float-left font-italic text-muted pr-4">Yazar: {{$article->getWriters->name}}</span>
                    <span class="float-left font-italic text-muted ">{{$article->created_at->diffForHumans()}}</span>
                    <div class="dislike d-inline-block float-right ml-3">
                        <a href="{{route('like.dislike',[$article->slug,'dislike'])}}" style="text-decoration: none; color:#6c757d">
                            <i class="fa fa-thumbs-down px-2 py-2 flag " @if(isset($islike) and $islike == 'dislike') style='color: white; border-color: red; background-color: red' @endif aria-hidden="true" value-count="{{$article->id}}" value-flag="dislike"></i>
                            <span style="font-size: 12px; color: #6c757d; @if(isset($islike) and $islike == 'dislike') color: red  @endif">{{count($article->getCountDislike)}}</span>
                        </a>
                    </div>
                    <div class="like d-inline-block float-right">
                        <a href="{{route('like.dislike',[$article->slug,'like'])}}" style="text-decoration: none; color:#6c757d ">
                            <i class="fa fa-thumbs-up px-2 py-2 flag" @if(isset($islike) and $islike == 'like') style='color: white; border-color: #139df8; background-color: #139df8' @endif aria-hidden="true"  value-count="{{$article->id}}" value-flag="like"></i>
                            <span style="font-size: 12px; @if(isset($islike) and $islike == 'like') color: #139df8  @endif ">{{count($article->getCountLike)}}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @if(session('message'))
                    <div class="alert alert-info">
                        {{session('message')}}
                    </div>
                @endif
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>{{$article->title}}</h1>
                {!! $article->article !!}
            </div>
        </div>
    </div>
@endsection

