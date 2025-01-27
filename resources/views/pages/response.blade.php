@extends('layouts.main')
@section('content')
<!-- MULAI CONTENT/ISI DISINI -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="row m-2">
                <div class="card shadow mb-4 col-lg-12 col-md-12">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                        <div class="dropdown no-arrow">
                            <a href="{{ url('profile/'.$topic->user->username) }}" class="text-decoration-none">
                            <img class="rounded-circle" style="aspect-ratio: 1/1;" width="50px"
                                src="{{ $topic->user->foto ? asset('img/profile/'.$topic->user->foto) : asset('img/profile/default.jpg') }}"
                                alt="">
                            <h5 style="margin-left: 60px; color:#000; margin-top: -45px; font-size: 15px;">
                                {{ $topic->user->username }}</h5>
                            <p style="margin-left: 60px; font-size: 12px;">{{ date('d M Y',
                                strtotime($topic->updated_at))
                                }}</p>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <h5 style="color: #435AE7;">{{ $topic->title }}</h5>
                        <p style="color:#000; font-size: 15px;">{{ $topic->content }}</p>
                        <div class="mb-3">
                            <img src="{{ asset('img/'.$topic->image) }}" alt="" width="500px">
                        </div>
                        <p style="color :#435AE7; font-size: 15px; margin-top: 35px;" id="count-answer">{{ $topic->response->count() }} Answer</p>
                        <button class="btn-response btn btn-outline-primary p-2 justify-content-center my-3 btn-sm" data-topic="{{ $topic->id }}"><i class="fa-solid fa-share"></i>&nbsp; 
                            Add Response</button>
                        @if (Auth::id() != $topic->user->id)
                        <button class="btn btn-outline-primary btn-sm" href="javascript:void(0)" onclick="openReport(event, {{ $topic->id }}, '{{ $topic->user->username }}', '{{app(App\Models\Topic::class)->getTable()}}')">
                            <span><i class="fa-solid fa-flag"></i> report</span>
                        </button>
                        @endif
                        <hr>
                        <div class="col-12 text-center" id="load-icon" style="display: none">
                            <img width="50px" src="{{ asset('img/loading.gif')}}" alt="">
                        </div>
                        <div id="content-response">
                        </div>
                    </div>
                     <!-- Modal -->
                     <div class="modal fade" id="commentModal" tabindex="-1" role="dialog"
                     aria-labelledby="commentModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                            <form id="form-add-response" method="post">
                                @csrf
                                <input type="hidden" name="topic_id" id="topic_id" value="{{ $topic->id }}">
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="parent_id" id="parent_id" value="0">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="commentModalLabel" style="color: #000000;">Add Response
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                         </div>
                     </div>
                     </div>

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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Page Wrapper -->
@endsection
@section('scripts')
<script>
    var url_response = "{{ url('response?topic_id='.$topic->id) }}"

    getResponse(url_response)

    function getResponse(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                beforeSend: function () {
                    $('#load-icon').show();
                },
                success: function (response) {
                 $('#load-icon').hide();  
                 $('#content-response').html(response); 
                 $('ul.pagination a').click(function (e) { 
                    e.preventDefault();
                    var href = $(this).attr('href');
                    getResponse(href)
                 });
                }
            });
        }

        $('.btn-response').click(function (e) { 
            e.preventDefault();
            // var topic_id = $(this).data('topic');
            // console.log(topic_id);
            // $('#topic_id').val(topic_id);
            $('#commentModal').modal('show');
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
                        $('#count-answer').html(response.data + ' answer');
                        getResponse(url_response)
                    }
                }
            });
        });

        function openReply(e, id, username) {
            e.preventDefault()
            $('#btnReply'+ id).attr('onclick', "sendReply(event, "+id+",'"+username+"')");
            $('#collapseExample'+ id).fadeToggle();
        }

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

        function sendReply(e, id, username) {
            e.preventDefault();
            var data = new FormData($($('#form-add-response'+ id))[0])
            var usr = '<a href="">@'+username+'&nbsp;</a>'
            var content = usr+data.get('content')
            data.append('content', content)
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
                             $('#error-message'+ id).append(v);
                        });
                    } else {
                        $('#form-add-response'+ id).trigger('reset');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#count-answer').html(response.data + ' answer');
                        getResponse(url_response)
                    }
                }
            });
        };

</script>

@endsection