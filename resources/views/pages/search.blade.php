@extends('layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- TopicHome -->
        <div class="col-xl-12 col-lg-7">
            <div class="col-12 text-center" id="load-icon" style="display: none">
                <img width="50px" src="{{ asset('img/loading.gif')}}" alt="">
            </div>
            <div class="row" id="content-topic">
                <div class="infinity-scroll">
                    @foreach ($topic as $item)
                    <div class="card shadow mb-4 col-lg-12 col-md-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                            <div class="dropdown no-arrow">
                                <img class="rounded-circle" style="height :60px; "
                                    src="{{ $item->user->foto ? asset('img/profile/'.$item->user->foto) :asset('img/profile/default.jpg') }}"
                                    alt="">
                                <h5 class="user-name">{{ $item->user->full_name }}</h5>
                                <p class="user-date">{{ date('d M Y', strtotime($item->updated_at)) }}</p>
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <h5 class="user-title">{{ $item->title }}</h5>
                            <p class="user-content">{{ $item->content }}</p>
                            <div class="text-center">
                                <img src="{{ asset('img/'.$item->image) }}" alt="" class="img-fluid">
                            </div>
                            <button class="btn-response p-2 justify-content-center my-3" data-toggle="modal"
                                data-target="#commentModal"><i class="fa-solid fa-share"></i> Add Response</button>
                            <button class="btn-like p-2 my-3 justify-content-center"><i class="fa-solid fa-thumbs-up"></i>
                                Like</button>
                            <a href="/all_response">
                                <button class="btn-see-rspn p-2 my-3 justify-content-center">See all response ></button>
                            </a>
                            <p style="color: #435AE7; font-size: 15px;" class="my-1">15 Answers</p>
                        </div>
    
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
                    @endforeach
                    {{ $topic->appends($_GET)->links() }}
                </div>
                <style>
                    .user-name {
                        margin-left: 70px;
                        color: #000;
                        margin-top: -50px;
                        font-size: 17px;
                    }

                    .user-date {
                        margin-left: 70px;
                        font-size: 13px;
                    }

                    .user-title {
                        color: #435AE7;
                    }

                    .user-content {
                        color: #000;
                        font-size: 15px;
                    }

                    .btn-response {
                        text-decoration: none;
                        background-color: #fff;
                        color: #435AE7;
                        border-color: #435AE7;
                        border-radius: 10px;
                        font-size: 15px;
                        "

                    }

                    .btn-like {
                        text-decoration: none;
                        background-color: #fff;
                        color: #435AE7;
                        border-color: #435AE7;
                        border-radius: 10px;
                        font-size: 15px;
                        "

                    }

                    .btn-see-rspn {
                        text-decoration: none;
                        background-color: #fff;
                        color: #435AE7;
                        border-color: #435AE7;
                        border-radius: 10px;
                        font-size: 15px;
                        color: #435AE7;
                        margin-left: 51%;
                        margin-top: -17px
                    }
                </style>

            </div>
        </div>
    </div>
</div>
<!-- End of Content Wrapper -->
@endsection
@section('styles')
<style>
    .user-trending {
        color: #000;
        margin-left: 60px;
        margin-top: -45px;
        "

    }

    .time-trending {
        margin-left: 60px;
        font-size: 10px;
        margin-top: -15px;
    }

    .content-trending {
        color: #000;
        font-size: 15px;
    }

    .top-user {
        color: #000;
        margin-left: 60px;
        font-size: 15px;
        margin-top: -45px;
        "

    }

    .user-post {
        color: #435AE7;
        font-size: 10px;
        margin-top: -35px;
        margin-left: 90%
    }
</style>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('ul.pagination').hide();
            $('.infinity-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img width="50px" src="/img/loading.gif" alt="">',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinity-scroll',
                callback: function(){
                    $('ul.pagination').remove();
                }
            })
        });
    </script>
@endsection