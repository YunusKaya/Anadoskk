

@extends('front.layouts.master')
@section('title','İletişim')
@section('content')
    <div class="container my-5">
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
        <h2>Bizimle İletişime Geçin</h2>
        <div class="border-left border-primary px-3 py-2 my-4 ml-4" style="border-width: 5px !important;">
            <form method="post" action="{{route('contactpost')}}">
               @csrf
                <div class="form-row my-2" >
                    <div class="form-group col-md-6">
                        <label for="firstname" class="text-secondary font-weight-bold">Ad:</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name" name="firstname" value="{{old('firstname')}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname" class="text-secondary font-weight-bold">Soyad:</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name" name="lastname" value="{{old('lastname')}}" required>
                    </div>
                </div>
                <div class="form-row my-2" >
                    <div class="form-group col-md-12">
                        <label for="subject" class="text-secondary font-weight-bold">Konu:</label>
                        <input type="text" class="form-control" placeholder="Enter Subject" name="subject" value="{{old('subject')}}" required>
                    </div>
                </div>
                <div class="form-row my-2" >
                    <div class="form-group col-md-12">
                        <label for="email" class="text-secondary font-weight-bold">E-Mail:</label>
                        <input type="email" class="form-control" placeholder="Enter E-Mail" name="email" value="{{old('email')}}" required>
                    </div>
                </div>
                <div class="form-row my-2">
                    <div class="col-md-12">
                        <label for="message" class="text-secondary font-weight-bold">Mesaj (Message):</label>
                        <textarea class="form-control" rows="7" name="message" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary rounded-0 my-4" style="width: 130px;">Gönder</button>
            </form>
        </div>
    </div>

    <br>
    <hr style="width: 40%; color: blue;">
    <br>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <p class="text-secondary font-weight-bold" style="text-indent:0px !important;">Address :</p>
                <p>
                    Anadolu University Student Center Room: 302 Floor: 3 Tepebaşı / Eskişehir 26210
                </p>
                <p class="text-secondary font-weight-bold" style="text-indent:0px !important;">Contact :</p>
                <p>+90 (222) 555 5555 </p>
                <p>anadosk@anadolu.edu.tr</p>
                <div class="d-flex flex-row justify-content-right my-4">
                    <div class="p-2">
                        <a href="https://www.facebook.com/groups/anadosk1/?ref=bookmarks" target="_blank">
                            <i class="fab fa-facebook-f icon"></i>
                        </a>
                    </div>
                    <div class="p-2">
                        <a href="https://www.instagram.com/anadosk.anadolu/" target="_blank">
                            <i class="fab fa-instagram icon"></i>
                        </a>
                    </div>
                    <div class="p-2">
                        <a href="#" >
                            <i class="fab fa-youtube icon"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item rounded border border-secondary" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3065.6262421826696!2d30.497984514740665!3d39.792942401264526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cc15c3697b75a7%3A0xdf8b4cdbe0f17c67!2sAnadolu%20%C3%9Cniversitesi%20%C3%96%C4%9Frenci%20Merkezi!5e0!3m2!1str!2str!4v1575310402434!5m2!1str!2str" frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
