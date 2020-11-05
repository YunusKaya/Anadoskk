

@extends('front.layouts.master')
@section('title','Yazarlar')
@section('front-cs')
    <style>
        .avatar {
            border: 0.3rem solid rgba(#fff, 0.3);
            margin-top: -6rem;
            margin-bottom: 1rem;
            max-width: 9rem;
        }
        .btn
        {
            min-width: 100px !important;
        }
    </style>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            @if(!Auth::check())
                @foreach($writers as $writer)
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 mt-5">
                        <div class="card">
                            <img class="card-img-top" src="{{$writer->borderimg}}" alt="Bologna">
                            <div class="card-body text-center">
                                <img class="avatar rounded-circle" src="{{$writer->img}}" alt="Bologna">
                            </div>
                            <div class="card-body pb-3" style="margin-top: -2rem">
                                <h4 class="card-title">
                                    {{$writer->name}}
                                </h4>
                                <p class="card-text">{{Str::limit($writer->biography,300)}}</p>
                                <a href="{{route('writer.profiles',$writer->slug)}}" class="btn btn-outline-info">Profil</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach($follows as $follow)
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 mt-5">
                        <div class="card">
                            <img class="card-img-top" src="{{$follow->getWriter->borderimg}}" alt="Bologna">
                            <div class="card-body text-center">
                                <img class="avatar rounded-circle" src="{{$follow->getWriter->img}}" alt="Bologna">
                            </div>
                            <div class="card-body pb-3" style="margin-top: -2rem">
                                <h4 class="card-title">
                                    {{$follow->getWriter->name}}
                                </h4>
                                <p class="card-text">{{Str::limit($follow->getWriter->biography,180)}}</p>
                                <a href="{{route('my.unfollow',$follow->getWriter->slug)}}" class="btn btn-danger">Takibi Bırak</a>
                                <a href="{{route('writer.profiles',$follow->getWriter->slug)}}" class="btn btn-outline-info">Profil</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach($unfollows as $unfollow)
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 mt-5">
                        <div class="card">
                            <img class="card-img-top" src="{{$unfollow->borderimg}}" alt="Bologna">
                            <div class="card-body text-center">
                                <img class="avatar rounded-circle" src="{{$unfollow->img}}" alt="Bologna">
                            </div>
                            <div class="card-body pb-3" style="margin-top: -2rem">
                                <h4 class="card-title">
                                    {{$unfollow->name}}
                                </h4>
                                <p class="card-text">{{Str::limit($unfollow->biography,300)}}</p>
                                <a href="{{route('my.unfollow',$unfollow->slug)}}" class="btn btn-primary" >Takip Et</a>
                                <a href="{{route('writer.profiles',$unfollow->slug)}}" class="btn btn-outline-info">Profil</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <br>
        <br>
    </div>
@endsection
