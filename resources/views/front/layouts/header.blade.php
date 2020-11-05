<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Blog Sitesi')</title>

    <!--** Public Style css and Logo **-->
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <!--** Style Link **-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!--** Java Script **-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


    @yield('front-cs')
</head>
<body>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg text-white"  style="border-bottom: #1886c7 2px solid !important;height:auto">

    <div class="container ">
        <a href="{{route('home')}}" class="navbar-brand mr-5">
            Anadolu Üniversitesi Doğa Sporları Kulübü
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-RockClimbingGuide" aria-controls="navbar-RockClimbingGuide">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-RockClimbingGuide">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a href="{{route('home')}}" class="nav-link text-white">Anasayfa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Makale
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink3">
                        <a class="dropdown-item text-white" href="{{route('writers')}}">Yazarlar</a>
                        <a class="dropdown-item text-white" href="{{route('article')}}">Makaleler</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Anadosk
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink2">
                        <a class="dropdown-item text-white" href="{{route('home')}}"> Kulübümüz </a>
                        <a class="dropdown-item text-white" href="{{route('dagcilik')}}">Dağcılık Nedir</a>
                        <a class="dropdown-item text-white" href="{{route('rapor')}}">Faliyet Raporları</a>
                        <a class="dropdown-item text-white" href="{{route('yazilar')}}">Duyuru & Ders</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{route('iletisim')}}" class="nav-link text-white"> İletişim </a>
                </li>
                @if(!Auth::check())
                    <a class="nav-link text-white" href="{{route('login.index')}}" > Giriş Yap </a>
                @elseif(Auth::user()->role == "user")
                    <li class="nav-item dropdown ml-3">
                        <a class="nav-link dropdown-toggle text-white font-italic" href="#" id="navbarDropdownMenuLink3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset(Auth::user()->img)}}" class="rounded-circle" style="max-width: 30px">

                        </a>
                        <div class="dropdown-menu border-0" aria-labelledby="navbarDropdownMenuLink3" >
                            <a class="dropdown-item profil text-center " href="{{route('my.info')}}">Bilgilerim</a>
                            <a class="dropdown-item profil text-center" href="{{route('my.get.password')}}">Şifre İşlemleri</a>
                            <a class="dropdown-item profil text-center" href="{{route('my.get.like')}}">Beğendiklerim</a>
                            <a class="dropdown-item profil text-center" href="{{route('my.follow')}}">Takip Ettiklerim</a>
                            <hr>
                            <a class="dropdown-item profil text-center" href="{{route('login.logout')}}">Çıkış Yap</a>
                        </div>
                    </li>
                @else
                    <div class="my-auto mx-2" style="border-left: 2px solid white; height: 20px"></div>
                    <a class="nav-link text-white" href="{{route('login.logout')}}" >Çıkış Yap</a>
                @endif
            </ul>
        </div>
    </div>
</nav>
