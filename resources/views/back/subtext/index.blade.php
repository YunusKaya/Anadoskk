
@extends('back.layouts.master')
@section('title','Alt Metin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('dagcilik')}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success mt-1 float-left"><i class="fa fa-eye"></i> Görüntüle</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Görsel</th>
                        <th>Yazı Başlığı</th>
                        <th>İçerik</th>
                        <th>Başlık</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($subtexts as $subtext)
                            <tr>
                                <td>
                                    @if ($subtext->img != "")
                                        <img src="{{asset($subtext->img)}}" width="180">
                                    @else
                                        Görsel Bulunamadı
                                    @endif
                                </td>
                                <td>{{$subtext->textsub}}</td>
                                <td style='max-width: 200px;'>{!! Str::limit($subtext->article,70)!!}</td>
                                <td>{{$subtext->getTitle->hood}}</td>
                                <td>{{$subtext->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('admin.altmetin.edit',$subtext->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> </a>
                                    <a href="{{route('admin.altmetin.show',$subtext->id)}}" title="Sil" class="btn btn-sm btn-danger text-white"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


@section('cs')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection
