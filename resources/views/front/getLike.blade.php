

@extends('front.layouts.master')
@section('title','Beğendiklerim')
@section('front-cs')
    <style>
        .card.colorful-card .testimonial-card {
            height: 95px;
        }
        .card.colorful-card .testimonial-card {
            border: 3px solid #fff !important;
        }
        .card.booking-card {
            background-color: #c7f2e3;
        }
        .card.booking-card .fa {
            color: #f7aa00;
        }
        .card.booking-card .card-body .card-text {
            color: #db2d43;
        }
        .card.card.booking-card .chip {
            background-color: #87e5da;
        }
        .card.booking-card .card-body hr {
            border-top: 1px solid #f7aa00;
        }
        .collapse-content .fa.fa-heart:hover {
            color: #f44336 !important;
        }
        .collapse-content .fa.fa-share-alt:hover {
            color: #0d47a1 !important;
        }
        a:hover
        {
            text-decoration: none !important;

        }
    </style>
@endsection
@section('content')
    <div class="container my-4">

        <h2 class="mb-4">@yield('title')</h2>
        <div class="row">
            @foreach($likes as $like)
                <div class="col-md-4">
                    <div class="card booking-card mt-2 mb-4">
                        <!-- Card image -->
                        <div class="view overlay">
                            <img class="card-img-top" src="{{$like->getArticle->img}}" alt="Card image cap">
                        </div>

                        <!-- Card content -->
                        <div class="card-body">

                            <!-- Title -->
                            <a href="{{route('article.detail',$like->getArticle->slug)}}" style="color: black;">
                                <h4 class="card-title font-weight-bold">{{$like->getArticle->title}}</h4>
                            </a>
                            <!-- Data -->
                            <ul class="list-unstyled list-inline rating">
                                <li class="list-inline-item mr-0"><i class="fas fa-thumbs-up"></i></li>
                                <li class="list-inline-item mr-0">{{count($like->getArticle->getCountLike)}}</li>
                            </ul>
                            <!-- Text -->
                            <p class="card-text">
                                {!! Str::limit($like->getArticle->article,75) !!}
                            </p>
                            <hr class="mt-4 ">
                            <span class="float-left font-italic text-dark">Kategori: {{$like->getArticle->getCategory->name}}</span>
                            <br>
                            <span class="mt-2 float-left font-italic text-dark">Yazar: {{$like->getArticle->getWriters->name}}</span>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
@endsection
