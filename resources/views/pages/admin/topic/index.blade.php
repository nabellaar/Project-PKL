@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Topic</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-outline-primary mb-3 btn-sm" href="{{ route('admin.topic.create')}}"><i class="fa-solid fa-plus"></i>&nbsp; Create Topic</a>
            <form
                class="d-none d-sm-inline-block float-right form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                method="GET">
                <div class="input-group">
                    <input name="keyword" id="search-topic" type="text" class="form-control bg-light border-0 small" autofocus
                        placeholder="Search for Topic" aria-label="Search" aria-describedby="basic-addon2">
                </div>
            </form>
            <div class="col-12 text-center" id="load-icon" style="display: none">
                <img width="50px" src="{{ asset('img/loading.gif')}}" alt="">
            </div>
            <div class="table-responsive" id="content-topic">
               
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var url = "{{ route('admin.topic.index') }}"
    getTopic(url)

    $('#search-topic').keyup(function (e) { 
        e.preventDefault()
        var search = $(this).val();
        getTopic(url + '?search=' + search)
    });

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

    function deleteTopic(e, id) {
        e.preventDefault()
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/topic') }}/"+id,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status == true) {
                        swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )   
                    } else {
                        swalWithBootstrapButtons.fire(
                        'Error!',
                        'This user owns a topic so it cant be deleted',
                        'error'
                        )
                    }
                    getTopic(url)
                }
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe',
            'error'
            )
        }
        })
            // var result = confirm('Apakah Anda Yakin Menghapus Topic  '+title+' ? ')
            // if (result) {
            //     
            // } else {
            //     alert('Data Aman!')
            // }
        }
</script>
@endsection