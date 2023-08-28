@extends('layouts.main')
@section('content')
                <!-- MULAI CONTENT/ISI DISINI -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="col-12 text-center" id="load-icon" style="display: none">
                        <img width="50px" src="{{ asset('img/loading.gif')}}" alt="">
                    </div>
                    <div class="row" id="content-answer">
                        <!-- Area Chart -->
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
        
    var url = "{{ route('answer.index') }}"

    getAnswer(url)
    
    function getAnswer(url) {
        $.ajax({
            type: "GET",
            url: url,
            cache: false,
            beforeSend: function () {
                $('#load-icon').show();
            },
            success: function (response) {
                $('#load-icon').hide();
                $('#content-answer').html(response);
                $('ul.pagination a').click(function (e) { 
                    e.preventDefault();
                    var href = $(this).attr('href');
                    getAnswer(href)
                 });
            }
        });
    }

    </script>
@endsection