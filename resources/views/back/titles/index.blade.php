
@extends('back.layouts.master')
@section('title','Dökümanlar')
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
                        <th>Yazı Başlığı</th>
                        <th>İçerik</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($titles as $title)
                            <tr>
                                <td>{{$title->hood}}</td>
                                <td>{!! Str::limit($title->title_article,50)!!}</td>
                                <td>{{$title->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('admin.dagcilik.edit',$title->id)}}" title="Düzenle" class="btn btn-sm btn-primary "><i class="fa fa-edit"></i> </a>
                                    <a title="Sil" title-id="{{$title->id}}" title-count="{{count($title->getSubtext)}}" title-name="{{$title->hood}}" class="remove-click btn btn-sm btn-danger text-white"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Makaleyi Sil</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div id="body" class="modal-body">
                    <div id="articleAlert" class="alert alert-danger"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    <form method="post" action="{{route('admin.dagcilik.delete')}}">
                        @csrf
                        <input type="hidden" name="id" id="deleteId">
                        <button id="deletebutton" type="submit" class="btn btn-success">Sil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('cs')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function ()
        {
            $('.remove-click').click(function ()
            {
                id = $(this)[0].getAttribute('title-id');
                count = $(this)[0].getAttribute('title-count');
                cname = $(this)[0].getAttribute('title-name');
                $('#body').hide();
                $('#deleteId').val(id);
                $('#articleAlert').html('');
                if (count > 0)
                {
                    $('#deletebutton').show();
                    $('#body').show();
                    $('#articleAlert').html('Bu başlığa ait ' + count + ' adet alt metin bulundu.Silmek istediğinize emin misiniz? <br> (NOT: Başlığa Ait Tüm Alt Metinler de Silinecekler)');
                }
                $('#deleteModal').modal();
            })
        })
    </script>
@endsection
