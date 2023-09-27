@extends('layouts.main')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div id="content" class="content content-full-width">
            <!-- begin profile -->
            <div class="profile">
               <div class="profile-header">
                  <!-- BEGIN profile-header-cover -->
                  <div class="profile-header-cover"></div>
                  <!-- END profile-header-cover -->
                  <!-- BEGIN profile-header-content -->
                  <div class="profile-header-content">
                     <!-- BEGIN profile-header-img -->
                     <div class="profile-header-img">
                        <img
                           src="{{ $profile->foto ? asset('img/profile/'.$profile->foto) :asset('img/profile/default.jpg') }}"
                           alt="">
                     </div>
                     <!-- END profile-header-img -->
                     <!-- BEGIN profile-header-info -->
                     <div class="profile-header-info">
                        <button class="btn btn-outline-white btn-sm float-right" href="javascript:void(0)" onclick="openReport(event, {{ $profile->id }}, '{{ $profile->username }}', '{{app(App\Models\User::class)->getTable()}}')">
                           <span><i class="fa-solid fa-flag"></i> report</span>
                       </button>
                        <h4 class="m-t-10 m-b-5">{{ $profile->username }}</h4>
                        <p class="m-b-10">{{ $profile->full_name }}</p>
                        <p class="m-b-10">{{ $profile->email }}</p>
                        <p class="m-b-10">{{ $profile->no_handphone }}</p>
                     </div>
                     <!-- END profile-header-info -->
                  </div>
                  <!-- END profile-header-content -->
                  <!-- BEGIN profile-header-tab -->
                  <ul class="profile-header-tab nav nav-tabs">
                     <li class="nav-item"><a
                           href="https://www.bootdey.com/snippets/view/bs4-profile-with-timeline-posts" target="__blank"
                           class="nav-link_">Topic</a></li>
                  </ul>
                  <!-- END profile-header-tab -->
               </div>
            </div>
            <!-- end profile -->
            <!-- begin profile-content -->
            <div class="profile-content">
               <!-- begin tab-content -->
               <div class="tab-content p-0">
                  <!-- begin #profile-post tab -->
                  <div class="tab-pane fade active show" id="profile-post">
                     <!-- begin timeline -->
                     <ul class="timeline">
                        @foreach ($profile->topic()->orderByDESC('updated_at')->get() as $topic)
                        <li>
                           <!-- begin timeline-time -->
                           <div class="timeline-time">
                              <span class="date">{{ date('d M Y', strtotime($topic->updated_at)) }}</span>
                              <span class="time">{{ date('H:i', strtotime($topic->updated_at)) }}</span>
                           </div>
                           <!-- end timeline-time -->
                           <!-- begin timeline-icon -->
                           <div class="timeline-icon">
                              <a href="javascript:;">&nbsp;</a>
                           </div>
                           <!-- end timeline-icon -->
                           <!-- begin timeline-body -->
                           <div class="timeline-body">
                              <div class="timeline-header">
                                 <span class="userimage">
                                    <img src="{{ $topic->user->foto ? asset('img/profile/'.$topic->user->foto) :asset('img/profile/default.jpg') }}"
                                       alt=""></span>
                                 <span class="username"><a href="javascript:;">{{ $topic->user->username }}</a> <small></small></span>
                                 <span class="pull-right" style="color: #435AE7;">{{ $topic->response->count() }} answer</span>
                              </div>
                              <div class="timeline-content">
                                 <p style="color: #435AE7;">
                                    {{ $topic->title }}
                                 </p>
                                 <p>
                                    {{ $topic->content }}
                                 </p>
                              </div>
                              <div class="timeline-footer">
                                 <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa-solid fa-thumbs-up"></i> Like</a>
                                 <a href="{{ url('topic/'. encrypt($topic->id)) }}" class="m-r-15 text-inverse-lighter"><i
                                       class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                              </div>
                           </div>
                           <!-- end timeline-body -->
                        </li>
                        @endforeach
                     </ul>    
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
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css')}}">
@endsection
@section('scripts')
<script>
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
</script>
@endsection