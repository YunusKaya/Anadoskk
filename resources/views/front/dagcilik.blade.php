

@extends('front.layouts.master')
@section('title','Dağcılık')
@section('content')

    <div class="container my-5">
        @foreach($titles as $title)
            <h1 class="text-center text-muted mt-3">{{$title->hood}}</h1>
            <hr style="border-color: #1886c7;width: 60%;">
            {!! $title->title_article !!}
            @foreach($title->getSubtext as $text)
                @if($text->img =="")
                    <div class="row mb-5 mt-5 align-seft-center">
                        <div class="coll-md-12">
                            <h3 class="text-dark">{{$text->textsub}}</h3>
                            {!! $text->article!!}
                        </div>
                    </div>
                @else
                    <div class="row mt-3 mb-5 mt-5  align-self-center">
                        <div class="col-md-5 text-center">
                            <img class="img-fluid" src="{{$text->img}}" alt="" style="border-radius: 10px; max-width: 400px; max-height: 350px;">
                        </div>
                        <div class="col-md-7  align-self-center">
                            <h3 class="text-dark">{{$text->textsub}}</h3>
                            <p>{!! $text->article!!}</p>
                        </div>
                    </div>
                @endif
                @if(!$loop->last)
                    <hr style="border-color: #1886c7;width: 30%;">
                @else
                    <br><br>
                @endif
            @endforeach
        @endforeach
    </div>
@endsection
