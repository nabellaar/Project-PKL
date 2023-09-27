@extends('layouts.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row ">
        <!-- TopicHome -->
        <div class="col-xl-8 col-lg-7">
            <div class="col-12 text-center" id="load-icon" style="display: none">
                <img width="50px" src="{{ asset('img/loading.gif')}}" alt="">
            </div>
            <div class="row" id="content-topic">
                <div class="infinity-scroll">
                    @foreach ($topic as $item)
                    <div class="card shadow mb-4 col-lg-12 col-md-12">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                            <div class="dropdown no-arrow">
                                <a href="{{ url('profile/'.$item->user->username) }}" class="text-decoration-none">
                                    <img class="rounded-circle" width="50px" style="aspect-ratio: 1/1;"
                                        src="{{ $item->user->foto ? asset('img/profile/'.$item->user->foto) :asset('img/profile/default.jpg') }}"
                                        alt="">
                                    <h5 class="user-name">{{ $item->user->username }}</h5>
                                    <p class="user-date">{{ date('d M Y', strtotime($item->updated_at)) }}</p>

                                </a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <h5 class="user-title">{{ $item->title }}</h5>
                            <p class="user-content">{{ $item->content }}</p>
                            <div class="mb-3">
                                <img src="{{ asset('img/'.$item->image) }}" alt="" width="300px">
                            </div>
                            <button class="btn btn-response btn-outline-primary justify-content-center btn-sm"
                                data-topic="{{ $item->id }}"><i class="fa-solid fa-share"></i> &nbsp;
                                Add Response</button>
                            <button
                                class="btn btn-sm @if (!user_likes(Auth::user()->id, $item->id)) btn-outline-primary @else btn-primary @endif justify-content-center btn-like"
                                data-user="{{Auth::user()->id}}" data-topic="{{$item->id}}"><i
                                    class="fa-solid fa-thumbs-up"></i>&nbsp;
                                @if (!user_likes(Auth::user()->id, $item->id)) Like @else Unlike @endif
                            </button>
                            @if (Auth::id() != $item->user->id)
                            <button class="btn btn-outline-primary btn-sm" href="javascript:void(0)" onclick="openReport(event, {{ $item->id }}, '{{ $item->user->username }}', '{{app(App\Models\Topic::class)->getTable()}}')">
                                <span><i class="fa-solid fa-flag"></i> report</span>
                            </button>
                            @endif
                            <a href="{{ url('topic/'. encrypt($item->id)) }}">
                                <button class="btn btn-see-rspn btn-outline-primary float-right btn-sm">See all response
                                    &nbsp;<i class="fa-solid fa-angle-right"></i></button>
                            </a>
                            <p class="my-1 mt-3 home-answer">{{ $item->response->count() }} answer</p>
                        </div>
                    </div>
                    @endforeach
                     <!-- Modal Report -->
                     <div class="modal fade" id="reportModal" tabindex="-1" role="dialog"
                     aria-labelledby="commentModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                            <form id="form-report" method="post">
                                @csrf
                                <input type="hidden" name="table_id" id="table_id">
                                <input type="hidden" name="table_name" id="table_name">
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reportModalLabel" style="color: #000000;">Report
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span class="badge badge-danger" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-check">
                                        <input class="form-check-input" id="reason1" type="radio" name="reason" value="Spam">
                                        <label class="form-check-label" for="reason1">Spam</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="reason2" type="radio" name="reason" value="Hate commment">
                                        <label class="form-check-label" for="reason2">Hate commment</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="reason3" type="radio" name="reason" value="Misinformation">
                                        <label class="form-check-label" for="reason3">Misinformation</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="reason3" type="radio" name="reason" value="Bullying">
                                        <label class="form-check-label" for="reason3">Bullying</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                         </div>
                     </div>
                     </div>
                    <!-- Modal -->
                    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog"
                        aria-labelledby="commentModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="form-add-response" method="post">
                                    @csrf
                                    <input type="hidden" name="topic_id" id="topic_id">
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="parent_id" id="parent_id" value="0">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="commentModalLabel" style="color: #000000;">Add
                                            Response
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="badge badge-danger" aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea name="content" id="content" class="form-control" rows="5"
                                            placeholder="Enter your response"></textarea>
                                        <span id="error-message"></span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{ $topic->appends($_GET)->links() }}
                </div>

            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="row m-1">
                <div class="card shadow mb-4 col-lg-12 col-md-12">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header d-flex flex-row align-items-center justify-content-between bg-white">
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <h5 style="color: #000;" class="pt-3">Trending Topic</h5>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        @foreach ($trending as $trend )
                        <img width="50px" style="aspect-ratio: 1/1;" class="rounded-circle"
                            src="{{ $trend->user->foto ? asset('img/profile/'.$trend->user->foto) : asset('img/profile/default.jpg') }}"
                            alt="">
                        <p class="user-trending">{{$trend->user->username}}</p>
                        <p class="time-trending">{{ date('d M Y', strtotime($trend->updated_at))}}</p>
                        <p class="title-trending">{{$trend->title}}</p>
                        <p class="content-trending">{{$trend->content}}</p>
                        <p class="total-likes-trending">{{$trend->likes_count}} likes</p>
                        <hr>
                        @endforeach
                    </div>
                </div>

                <!-- CARD KEDUA -->
                <div class="card shadow mb-4 col-lg-12 col-md-12">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header d-flex flex-row align-items-center justify-content-between bg-white">
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <h5 style="color: #000;" class="pt-3">Top User</h5>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        @foreach ($top_user as $top)
                        <img width="50px" style="aspect-ratio: 1/1;" class="rounded-circle"
                            src="{{ $top->foto ? asset('img/profile/'.$top->foto) : asset('img/profile/default.jpg') }}"
                            alt="">
                        <p class="top-user">{{$top->username}}</p>
                        <p class="user-post float-right">{{$top->topic_count}} Topic</p>
                        <hr style="margin-top: 30px;">
                        @endforeach
                    </div>
                </div>
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

    .title-trending {
        color: #435AE7;
        margin-bottom: 10px;
    }

    .content-trending {
        color: #000;
        font-size: 15px;
    }

    .total-likes-trending {
        color: #435AE7;
        font-size: 13px;
    }

    .top-user {
        color: #000;
        margin-left: 60px;
        font-size: 15px;
        margin-top: -45px;

    }

    .user-post {
        color: #435AE7;
        font-size: 10px;
        margin-top: -35px;

    }

    .home-answer {
        color: #435AE7;
        font-size: 15px;
    }
</style>
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

    /* .btn-response {
        text-decoration: none;
        background-color: #fff;
        color: #435AE7;
        border-color: #435AE7;
        border-radius: 10px;
        font-size: 15px;

    } */

    .btn-see-rspn {
        /* text-decoration: none; */
        background-color: white;
        /* color: #435AE7;
        border-color: #435AE7; */
        border-radius: 5px;
        font-size: 15px;
        /* color: #435AE7; */
        /* margin-right: 20%; */



    }
</style>
@endsection
@section('scripts')
<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
                        button.html('<i class="fa-solid fa-thumbs-up"></i> Like');
                    } else {
                        button.removeClass('btn-outline-primary');
                        button.addClass('btn-primary');
                        button.html('<i class="fa-solid fa-thumbs-up"></i> Unlike');
                    }
                }
            })
        });

        $('.btn-response').click(function (e) { 
            e.preventDefault();
            var topic_id = $(this).data('topic');
            $('#topic_id').val(topic_id);
            $('#commentModal').modal('show');
        });

        function openReport(e, id, username, table_name) {
            e.preventDefault()
            $('#table_id').val(id);
            $('#table_name').val(table_name);
            $('#reportModalLabel').html('Report '+ username);
            $('#reportModal').modal('show');

        }

        $('#form-report').submit(function (e) { 
            e.preventDefault();
            var data = new FormData($($('#form-report'))[0])
            $.ajax({
                type: "POST",
                url: "{{ route('report.store')}}",
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (response) {
                    $('#form-report').trigger('reset');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    $('#reportModal').modal('hide');
                }
            });
        }); 

        $('#form-add-response').submit(function (e) { 
            e.preventDefault();
            var data = new FormData($(this)[0])
            $.ajax({
                type: "POST",
                url: "{{ route('response.store') }}",
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (response) {
                    if (response.status == 0) {
                        $.each(response.data, function (i, v) { 
                             $('#error-message').append(v);
                        });
                    } else {
                        $('#form-add-response').trigger('reset');
                        $('#commentModal').modal('hide');
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                     })

                     location.replace(response.url)
                    }
                }
            });
        });
</script>
@endsection