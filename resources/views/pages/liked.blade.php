@extends('layouts.main')
@section('content')
<!-- MULAI CONTENT/ISI DISINI -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="col-12 text-center" id="load-icon" style="display: none">
                    <img width="50px" src="{{ asset('img/loading.gif')}}" alt="">
                </div>
                <div class="row" id="content-liked">
                    <!-- Modal -->
                    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
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
        
    var url = "{{ route('likes.index') }}"

    getLiked(url)
    
    function getLiked(url) {
        $.ajax({
            type: "GET",
            url: url,
            cache: false,
            beforeSend: function () {
                $('#load-icon').show();
            },
            success: function (response) {
                $('#load-icon').hide();
                $('#content-liked').html(response);
                $('ul.pagination a').click(function (e) { 
                    e.preventDefault();
                    var href = $(this).attr('href');
                    getLiked(href)
                 });
            }
        });
    }

     $('body').on('click', '.btn-like', function(e) {
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
                    getLiked(url)
                }
            })
        });
</script>
@endsection