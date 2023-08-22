@extends('layouts.main')
@section('content')
<!-- MULAI CONTENT/ISI DISINI -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="row">
                <div class="card shadow mb-4 col-lg-12 col-md-12">
                    @foreach ($like as $item)
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                        <div class="dropdown no-arrow">
                            <img class="rounded-circle" style="height :60px; "
                                src="{{ $item->user->foto ? asset('img/profile/'.$item->user->foto) :asset('img/profile/default.jpg') }}"
                                alt="">
                            <h5 style="margin-left: 70px; color:#000; margin-top: -50px; font-size: 17px;">
                                {{ $item->user->full_name }}</h5>
                            <p style="margin-left: 70px; font-size: 13px;">{{ date('d M Y',
                                strtotime($item->updated_at)) }}</p>
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <h5 style="color: #435AE7;">{{ $item->title }}</h5>
                        <p style="color:#000; font-size: 15px;">{{ $item->content }}</p>
                        <div class="text-center">
                            <img src="{{ asset('img/'.$item->image) }}" alt="" class="img-fluid">
                        </div>
                        <a href="{{ url('topic/'. encrypt($item->id)) }}">
                        <button class="p-2 justify-content-center my-3" style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px;" data-toggle="modal"
                            data-target="#commentModal"><i class="fa-solid fa-share" style="color: #435ae7;"></i> Add
                            Response</button>
                        </a>
                        <button class="btn @if (!user_likes(Auth::user()->id, $item->id)) btn-outline-primary @else btn-primary @endif justify-content-center btn-like" data-user="{{Auth::user()->id}}" data-topic="{{$item->id}}"><i class="fa-solid fa-thumbs-up"></i>
                            Like</button>
                        <a href="/all_response">
                            <button class="p-2 my-3 justify-content-center"
                                style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px; color: #435AE7; margin-left: 51%; margin-top: -17px">See all response ></button>
                        </a>
                        <p style="color: #435AE7; font-size: 15px;" class="my-1">15 Answers</p>
                    </div>
                    @endforeach
                    <!-- Modal -->
                    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog"
                        aria-labelledby="commentModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="commentModalLabel" style="color: #000000;">Add Response
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <textarea class="form-control" rows="5"
                                        placeholder="Enter your response"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Page Wrapper -->
                @endsection

@section('scripts')
<script>
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
     $('.btn-like').click(function(e){
            e.preventDefault();
            var button = $(this)
            var user_id = $(this).data('user');
            var topic_id = $(this).data('topic');
            $.ajax({
                type: "POST",
                url: "{{ route('likes.store') }}",
                data: {
                    user_id: user_id,
                    topic_id: topic_id,
                },
                cache: false,
                success: function (response) {
                    if (response.status == 0) {
                        button.removeClass('btn-primary');
                        button.addClass('btn-outline-primary');
                    } else {
                        button.removeClass('btn-outline-primary');
                        button.addClass('btn-primary');
                        
                    }
                }
            })
        });
</script>
@endsection