

@extends('front.layouts.master')
@section('title','Takip Ettiğim')
@section('front-cs')
    <style>
        .avatar {
            border: 0.3rem solid rgba(#fff, 0.3);
            margin-top: -6rem;
            margin-bottom: 1rem;
            max-width: 9rem;
        }
    </style>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            @foreach($follows as $follow)
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 mt-5">
                    <div class="card">
                        <img class="card-img-top" src="{{$follow->getWriter->borderimg}}" alt="Bologna">
                        <div class="card-body text-center">
                            <img class="avatar rounded-circle" src="{{$follow->getWriter->img}}" alt="Bologna">
                            <h4 class="card-title">
                                {{$follow->getWriter->name}}
                            </h4>
                            <p class="card-text">{{Str::limit($follow->getWriter->biography,300)}}</p>
                            <a href="{{route('my.unfollow',$follow->getWriter->slug)}}" class="btn btn-info">Takibi Bırak</a>
                            <a href="{{route('writer.profiles',$follow->getWriter->slug)}}" class="btn btn-outline-info">Profil</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <br>
    </div>
@endsection
