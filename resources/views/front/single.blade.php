

@extends('front.layouts.master')
@section('title','Yazılar')
@section('content')
    <div class="container mt-3">
        @if(count($pages)>0)
            @foreach($pages as $page)
                <h1 class="text-center">{{$page->hood}}</h1>
                <img src="{{$page->img}}" style="max-width: 70%">
                <p>{!! $page->article !!}
            @endforeach
        @else
            <div class="alert alert-danger">
                Böyle bir sayfa bulunamadı.
            </div>
        @endif
    </div>
    <hr>
@endsection
