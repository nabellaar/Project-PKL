@extends('layouts.main')
@section('content')
<!-- MULAI CONTENT/ISI DISINI -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 text-center" id="load-icon" style="display: none">
            <img width="50px" src="{{ asset('img/loading.gif')}}" alt="">
        </div>
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="row" id="content-topic">
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
</div>
@endsection
@section('scripts')
    <script>
        var url = "{{ route('topic.index') }}"

        getTopic(url)

        function getTopic(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                beforeSend: function () {
                    $('#load-icon').show();
                },
                success: function (response) {
                 $('#load-icon').hide();  
                 $('#content-topic').html(response); 
                }
            });
        }

        function modalEdit(id) {
            $.ajax({
                type: "GET",
                url: `{{ url('topic/${id}/edit') }}`,
                cache: false, 
                success: function (response) {
                    $('#exampleModal').html(response);
                    $('#exampleModal').modal('show');
                }
            });
        }
    </script>
@endsection