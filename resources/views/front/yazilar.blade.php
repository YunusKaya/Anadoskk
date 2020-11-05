

@extends('front.layouts.master')
@section('title','Yazılar')
@section('content')

    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, quod neque, nobis officia veniam porro vel illo minus quisquam eius impedit necessitatibus, sapiente eos. Vitae praesentium quia provident ab eum!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, quod neque, nobis officia veniam porro vel illo minus quisquam eius impedit necessitatibus, sapiente eos. Vitae praesentium quia provident ab eum!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, quod neque, nobis officia veniam porro vel illo minus quisquam eius impedit necessitatibus, sapiente eos. Vitae praesentium quia provident ab eum!</p>
            </div>
        </div>
        <h1 class="text-center text-muted mt-3">Yazılar</h1>
        <hr style="border-color: #1886c7;width: 60%;">
        <div class='row mt-4'>
            <div class='col-md-8'>
                @foreach($pages as $page)
                    <div class='card mb-3 border-0'>
                        <div class='row no-gutters'>
                            <div class='col-md-4 align-self-center'>
                                <img src='{{$page->img}}' class='card-img-top link'>
                            </div>
                            <div class='col-md-8'>
                                <a class="text-dark" href="{{route('single',[$page->slug,$page->id])}}">
                                    <h5 class='card-header'>
                                        {{$page->hood}}
                                    </h5>
                                </a>
                                <div class='card-body'>
                                    <div class='card-text'>
                                        {!! Str::limit($page->article,75)!!}
                                    </div>
                                    <label class='float-right'>{{$page->created_at->diffForHumans()}}</label>
                                </div>
                            </div>
                        </div>
                        @if (!$loop->last)
                            <hr>
                        @endif
                    </div>
                @endforeach
                {{$pages->links()}}
            </div>
            @include('front.layouts.categoryWidget')
        </div>
    </div>
    <hr></hr>
@endsection
