

@extends('front.layouts.master')
@section('title','Yazarlar')
@section('front-cs')
    <style>
        .avatar {
            border: 0.3rem solid rgba(#fff, 0.3);
            margin-top: -6rem;
            margin-bottom: 1rem;
            max-width: 11rem;
            border: 6px solid white;
        }

        .card-footer {
            background-color: white;
        }

        .fa-thumbs-up {
            border: 2px solid #139df8;
            color: white;
            background-color: #139df8;
            border-radius: 50%;
            font-size: 15px;
        }

        .fa-thumbs-down {
            border: 2px solid red;
            color: white;
            background-color: red;
            border-radius: 50%;
            font-size: 15px;
        }
    </style>
@endsection
@section('content')

    <div class="container">
        <div class="row my-3">
            <div class="col-md-12">
                <div class="card">
                    <img class="img-fluid" src="{{$writer->borderimg}}" alt="Bologna">
                    <div class="card-body text-center">
                        <img class="avatar rounded-circle" src="{{$writer->img}}" alt="Bologna">
                    </div>
                    <div class="card-body pb-3" style="margin-top: -2rem">
                        <h4 class="card-title">
                            {{$writer->name}}
                        </h4>
                        <p class="card-text">{{$writer->biography}}</p>
                    </div>
                    <div class="card-footer">
                        @foreach($likedislikes as $likedislike)
                            @if($likedislike->statu == 0)
                                <i class="fa fa-thumbs-down px-2 py-2 ml-2" ></i>
                            @else
                                <i class="fa fa-thumbs-up px-2 py-2" ></i>
                            @endif
                            <span style="font-size: 12px; color: #6c757d;">{{$likedislike->total}}</span>
                        @endforeach
                            <a href="#" class="float-right btn btn-outline-info mr-3">Takip Et</a>
                            <span class="float-right mr-2 mt-3" style=  "font-size: 15px; color: #6c757d;">
                                {{count($writer->getFollows)}}
                            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($writer->getArticle as $key => $article)
                <div class="col-md-6 px-4 @if($key > 1) border-top border-primary @endif">
                    <div class="row my-4">
                        <div class="col-md-5 px-0">
                            <img class="card-img-top rounded" src="{{$article->img}}">
                        </div>
                        <div class="col-md-7">
                            <p style="text-indent:0px !important; display: block !important;">
                                <span class="float-left font-italic text-muted">Kategori: {{$article->getCategory->name}}</span>
                                <span class="float-right font-italic text-muted">{{$article->created_at->diffForHumans()}}</span>
                            </p><br>
                            <h4 class="card-title">{{Str::limit($article->title,30)}}</h4>
                            <p class="card-text">{!! Str::limit($article->article,75) !!}</p>

                            <a href="{{route('article.detail',$article->slug)}}" class="btn btn-outline-primary rounded-0 float-right">
                                Devamını Oku
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
    <br>
    <br>
    <br>
@endsection
