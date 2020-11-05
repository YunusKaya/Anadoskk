
@extends('back.layouts.master')
@section('title','Faliyet Raporları')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Rapor Yükle</h6>

                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                    <form method="post" action="{{route('admin.report.create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tarih Aralığı</label>
                            <input type="text" class="form-control" name="date" required>
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <input type="text" class="form-control" name="ack" required>
                        </div>
                        <div class="form-group">
                            <label>Rapor</label>
                            <input type="file" name="upload_file" class="form-control-file" accept="application/pdf">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="font-weight-bold text-primary d-inline float-left">Tüm Faaliyet Raporları</h6>
                    <a href="{{route('rapor')}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success d-inline float-right"><i class="fa fa-eye"></i> Görüntüle</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Tarih Aralığı</th>
                                <th>Açıklama</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <td>{{$report->explanationDate}}</td>
                                        <td>{{$report->explanation}}</td>
                                        <td>
                                            <a title="Düzenle" report-id="{{$report->id}}" class="edit-click btn btn-sm btn-primary text-white"><i class="fa fa-edit"></i></a>
                                            <a title="Sil" report-id="{{$report->id}}" class="remove-click btn btn-sm btn-danger text-white"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Düzenle</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" action="{{route('admin.report.update')}}" enctype='multipart/form-data'>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Tarih Aralığı</label>
                            <input id="date2" type="text" class="form-control" name="date2">
                            <input type="hidden" name="id" id="report_id">
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <input id="ack2" type="text" class="form-control" name="ack2">
                        </div>
                        <div class="form-group">
                            <label>Rapor</label>
                            <input type="file" name="upload_file" class="form-control-file" accept="application/pdf">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-success">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Raporu Sil</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div id="body" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    <form method="post" action="{{route('admin.report.delete')}}">
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
            $('.remove-click').click(function (){
                id=$(this)[0].getAttribute('report-id');
                $('#body').hide();
                $('#deleteId').val(id);
                $('#deleteModal').modal();
            })

            $('.edit-click').click(function () {
                id = $(this)[0].getAttribute('report-id');
                $.ajax({
                    type: 'GET',
                    url: '{{route('admin.report.getData')}}',
                    data: {id: id},
                    success: function (data) {
                        console.log(data);
                        $('#date2').val(data.explanationDate);
                        $('#ack2').val(data.explanation);
                        $('#report_id').val(data.id);
                        $('#editModal').modal();
                    }
                })
            })
        });
    </script>
@endsection
