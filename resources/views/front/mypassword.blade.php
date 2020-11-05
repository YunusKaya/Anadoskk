

@extends('front.layouts.master')
@section('title','Şifre İşlemleri')
@section('content')
    <div class="container my-4">

        <h2 class="mb-4">@yield('title')</h2>

        <form method="post" action="{{route('my.get.password.post')}}">
            @csrf
            <div class="row ">
                <div class="col-md-8 pr-0">
                    <div class="form-group">
                        <label for="newpassword" class="text-secondary font-weight-bold">Yeni Şifre:</label>
                        <input type="password" class="form-control" placeholder="Enter New Password" name="newpassword" required>
                    </div>
                    <div class="form-group">
                        <label for="repeatpassword" class="text-secondary font-weight-bold">Şifre Tekrar</label>
                        <input type="password" class="form-control" placeholder="Enter Repeat Password" name="repeatpassword" required>
                    </div>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-outline-primary rounded-0" style="min-width: 130px">Kaydet</button>
                    </div>
                </div>
                <div class="col-md-4">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('danger'))
                        <div class="alert alert-danger">
                            {{session('danger')}}
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>
@endsection
