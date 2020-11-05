<div class="col-md-3">

    <div class="card-header">Katogoriler</div>
    <div class="list-group">
        @foreach($catagories as $catogori)
            <li class="list-group-item  @if(Request::segment(2)==$catogori->slug) active @endif ">
                <a class="text-dark" href="{{route('category',$catogori->slug)}}">
                    {{$catogori->name}}
                </a>
                <span class="badge bg-danger float-right text-white">
                    {{$catogori->articleCount()}}
                </span>
            </li>
        @endforeach
            <li class="list-group-item ">
                <a class="text-dark" href="{{route('yazilar')}}">
                    Tümü
                </a>
            </li>
    </div>
</div>
