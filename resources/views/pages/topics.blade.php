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
            <div class="alert alert-success success-msg" role="alert" style="display: none">
            </div>
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
                 $('ul.pagination a').click(function (e) { 
                    e.preventDefault();
                    var href = $(this).attr('href');
                    getTopic(href)
                 });
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

        function saveUpdate(id) {
            var data = new FormData($('#form-edit-topic')[0])
            $.ajax({
                type: "POST",
                url: "{{ url('topic') }}/"+id,
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (response) {
                    //console.log(response);
                    if (response.status == false) {
                        $(".error-msg").show();
                        $.each(response.data, function (key, value) { 
                             $(".error-msg").find("ul").append("<li>" + value + "</li>");
                        });
                    } else {
                        $('#exampleModal').modal('hide');
                        $('#form-edit-topic').trigger('reset');
                        $(".success-msg").html(response.message).show();
                        getTopic(url)
                    }

                }
            });
        }

        function deleteTopic(e, id, title) {
            var result = confirm('Apakah Anda Yakin Menghapus Topic  '+title+' ? ')
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('topic') }}/"+id,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        $(".success-msg").html(response.message).show();
                        getTopic(url)
                    }
                });
            } else {
                alert('Data Aman!')
            }
        }
    </script>
@endsection