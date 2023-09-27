@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-outline-primary mb-3 mt-4 btn-sm" href="{{ route('admin.user.create')}}"><i class="fa-solid fa-plus"></i>&nbsp; Create</a>
            <form
                class="d-none d-sm-inline-block float-right form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                method="GET">
                <div class="input-group">
                    <input name="keyword" type="text" id="search-user" class="form-control bg-light border-0 small" autofocus
                        placeholder="Search for User" aria-label="Search" aria-describedby="basic-addon2">
                </div>
            </form>
            <div class="col-12 text-center" id="load-icon" style="display: none">
                <img width="50px" src="{{ asset('img/loading.gif')}}" alt="">
            </div>
            <div class="table-responsive" id="content-user">
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var url = "{{ route('admin.user.index') }}"
    getUser(url)

    $('#search-user').keyup(function (e) { 
        e.preventDefault()
        var search = $(this).val();
        getUser(url + '?search=' + search)
    });

    function getUser(url) {
        $.ajax({
            type: "GET",
            url: url,
            cache: false,
            beforeSend: function () {
                $('#load-icon').show();
            },
            success: function (response) {
                $('#load-icon').hide();  
                $('#content-user').html(response); 
                $('ul.pagination a').click(function (e) { 
                e.preventDefault();
                var href = $(this).attr('href');
                getUser(href)
                });
            }
        });
    }

    function blockUser(e, id) {
        e.preventDefault()
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'm-1 btn btn-success',
            cancelButton: 'm-1 btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, block it!',
        cancelButtonText: 'Cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: "{{ url('admin/user') }}/"+id,
                data: {
                    status : 0,
                },
                cache: false,
                success: function (response) {
                    if (response.status == true) {
                        swalWithBootstrapButtons.fire(
                        'Blocked!',
                        'User has been blocked.',
                        'success'
                        )   
                    } else {
                        swalWithBootstrapButtons.fire(
                        'Error!',
                        'This user cant be blocked',
                        'error'
                        )
                    }
                    getUser(url)
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
    }

    function unblockUser(e, id) {
        e.preventDefault()
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'm-1 btn btn-success',
            cancelButton: 'm-1 btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, unblock it!',
        cancelButtonText: 'Cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: "{{ url('admin/user') }}/"+id,
                data: {
                    status : 1,
                },
                cache: false,
                success: function (response) {
                    if (response.status == true) {
                        swalWithBootstrapButtons.fire(
                        'Unblocked!',
                        'User has been Unblocked.',
                        'success'
                        )   
                    } else {
                        swalWithBootstrapButtons.fire(
                        'Error!',
                        'This response cant be unblocked',
                        'error'
                        )
                    }
                    getUser(url)
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
    }
</script>
@endsection