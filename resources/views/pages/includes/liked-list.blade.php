@foreach ($like as $item)
<div class="card shadow mb-4 col-lg-12 col-md-12">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
        <div class="dropdown no-arrow">
            <img class="rounded-circle" style="height :60px; "
                src="{{ $item->user->foto ? asset('img/profile/'.$item->user->foto) :asset('img/profile/default.jpg') }}"
                alt="">
            <h5 style="margin-left: 70px; color:#000; margin-top: -50px; font-size: 17px;">
                {{ $item->user->username }}</h5>
            <p style="margin-left: 70px; font-size: 13px;">{{ date('d M Y',
                strtotime($item->topic->updated_at)) }}</p>
            {{-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </a> --}}
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <h5 style="color: #435AE7;">{{ $item->topic->title }}</h5>
        <p style="color:#000; font-size: 15px;">{{ $item->topic->content }}</p>
        <div class="text-center">
            <img src="{{ asset('img/'.$item->topic->image) }}" alt="" class="img-fluid">
        </div>
        <button class="p-2 justify-content-center my-3" style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                            border-radius: 10px; font-size: 15px;" data-toggle="modal"
            data-target="#commentModal"><i class="fa-solid fa-share" style="color: #435ae7;"></i> Add
            Response</button>
        {{-- </a> --}}
        <button class="btn @if (!user_likes(Auth::user()->id, $item->topic->id)) btn-outline-primary @else btn-primary @endif justify-content-center btn-like" data-user="{{Auth::user()->id}}" data-topic="{{$item->topic->id}}"><i class="fa-solid fa-thumbs-up"></i>
            @if (!user_likes(Auth::user()->id, $item->topic->id)) 
                Like 
            @else 
                Unlike 
            @endif
        </button>
        <a href="{{ url('topic/'. encrypt($item->topic->id)) }}">
            <button class="p-2 my-3 justify-content-center float-right"
                style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                            border-radius: 10px; font-size: 15px; color: #435AE7; margin-left: 51%; margin-top: -17px">See all response ></button>
        </a>
        <p style="color: #435AE7; font-size: 15px;" class="my-1">15 Answers</p>
    </div>
</div>
@endforeach
{{ $like->appends($_GET)->links() }}