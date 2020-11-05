

@extends('front.layouts.master')
@section('title','Faliyet Raporları')
@section('front-cs')
    <style>
        .flex-1
        {
            display: none !important;
        }
        .text-sm
        {
            text-align: center !important;
        }
        svg
        {
            width: 20px !important;
            height: 20px !important;
        }
    </style>
@endsection
@section('content')

    <div class="container mt-4">
        <h1 class="text-muted">Anadosk Faaliyet Raporları</h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quam repellendus? Sapiente minus
            reiciendis odit natus dignissimos architecto. Eveniet nihil impedit nostrum quod enim aliquam molestias consectetur
            error voluptatem nulla at veniam quo praesentium dolorem accusantium molestiae tempora repudiandae eaque, eius
            voluptate accusamus, labore reiciendis explicabo. Expedita sit sequi velit consectetur vitae quidem? Nostrum
            quia maxime laborum quod, sequi eos, ipsum officia molestiae, quidem pariatur voluptatum totam minus omnis
            obcaecati nam non corrupti labore architecto? Mollitia, dolores voluptas hic ullam incidunt odit atque sed at
            tenetur, minima quibusdam inventore amet officiis unde veniam quae alias tempore tempora, saepe natus? Ad.
        </p>
    </div>
    <!--Table -->
    <div class="container mt-5">
        <input class="form-control" id="mySearch" type="text" placeholder="Search..." style="width: 300px;">
    </div>

    <div class="table-responsive-md my-3 container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tarih</th>
                <th scope="col">Açıklama</th>
                <th scope="col">Pdf</th>
            </tr>
            </thead>
            <tbody id="myTable">
                @foreach($reports as $report)
                    <tr>
                        <td>#</td>
                        <td>{{$report->explanationDate}}</td>
                        <td>{{$report->explanation}}</td>
                        <td>
                            <a target="_blank" href='{{$report->URL}}'>
                                <i class='far fa-file-pdf'  style='font-size: 30px;'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{$reports->links()}}
    </div>
    <hr class="my-5">


    <script>
        $(document).ready(function(){
            $("#mySearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection

