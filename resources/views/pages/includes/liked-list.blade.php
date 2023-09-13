@foreach ($like as $item)
<div class="container-fuild">
    <div class="card shadow mb-4 col-lg-12 col-md-12">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
            <div class="dropdown no-arrow">
                <img class="rounded-circle" style="aspect-ratio: 1/1;" width="50px"
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
            <button class="btn btn-outline-primary btn-sm" data-toggle="modal"
                data-target="#commentModal"><i class="fa-solid fa-share"></i>&nbsp; Add
                Response</button>
            {{-- </a> --}}
            <button class="btn btn-sm @if (!user_likes(Auth::user()->id, $item->topic->id)) btn-outline-primary @else btn-primary @endif justify-content-center btn-like" data-user="{{Auth::user()->id}}" data-topic="{{$item->topic->id}}"><i class="fa-solid fa-thumbs-up"></i>
                @if (!user_likes(Auth::user()->id, $item->topic->id)) 
                    Like 
                @else 
                    Unlike 
                @endif
            </button>
            <a href="{{ url('topic/'. encrypt($item->topic->id)) }}">
                <button class="btn btn-outline-primary btn-sm float-right">See all response ></button>
            </a>
            <p style="color: #435AE7; font-size: 15px;" class="my-1 mt-3">15 Answers</p>
        </div>
    </div>
</div>
@endforeach
{{ $like->appends($_GET)->links() }}