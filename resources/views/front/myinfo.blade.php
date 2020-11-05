

@extends('front.layouts.master')
@section('title','Bilgilerim')
@section('front-cs')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/croppie.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/croppie.css')}}">

@endsection
@section('content')
    <div class="container my-4">

        <h2 class="mb-4">@yield('title')</h2>

        <form method="post" action="{{route('my.info.post')}}" enctype="multipart/form-data">
            @csrf
            <div class="row ">
                <div class="col-md-8 pr-0">
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
                    <div class="form-group">
                        <label for="firstname" class="text-secondary font-weight-bold">Ad Soyad:</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name" name="name" value="{{Auth::user()->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-secondary font-weight-bold">Email:</label>
                        <input type="email" class="form-control" placeholder="Enter E-Mail" name="email" value="{{Auth::user()->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="biografi" class="text-secondary font-weight-bold">Biyografi:</label>
                        <textarea class="form-control" name="biografi" rows="15">
                            {!! Auth::user()->biography!!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary rounded-0" style="min-width: 130px">Kaydet</button>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{asset(Auth::user()->img)}}" class="img-fluid rounded-circle" >
                    <input type="file" name="upload_image" id="upload_image" class="mt-3"/>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('fornt-js')

    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Resmi Yükle & Kırp</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <div id="image_demo" style="width:350px; margin-top:30px"></div>
                        </div>
                        <div class="col-md-4" style="padding-top:30px;">

                            <button class="btn btn-success crop_image">Kırp & Yükle</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width:200,
                    height:200,
                    type:'square' //circle
                },
                boundary:{
                    width:300,
                    height:300
                }
            });

            $('#upload_image').on('change', function(){
                var reader = new FileReader();
                reader.onload = function (event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal('show');
            });

            $('.crop_image').click(function(event){
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response){
                    $.ajax({
                        url:"{{route('my.image.post')}}",
                        type: "POST",
                        data:{"image": response,"_token": "{{ csrf_token() }}"},
                        success:function(data)
                        {
                            $('#uploadimageModal').modal('hide');
                            location.reload();
                        }
                    });
                })
            });

        });
    </script>
@endsection
