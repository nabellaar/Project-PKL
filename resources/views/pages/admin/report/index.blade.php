@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Report Response</h6>
        </div>
        <div class="card-body">
            <form
                class="d-none d-sm-inline-block float-right form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                method="GET">
                <div class="input-group">
                    <input name="keyword" id="search-report" type="text" class="form-control bg-light border-0 small" autofocus
                        placeholder="Search for Report" aria-label="Search" aria-describedby="basic-addon2">
                </div>
            </form>
            <div class="col-12 text-center" id="load-icon" style="display: none">
                <img width="50px" src="{{ asset('img/loading.gif')}}" alt="">
            </div>
            <div class="table-responsive" id="content-report">
               
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var url = "{{ route('admin.report.index') }}"
    getReport(url)

    $('#search-report').keyup(function (e) { 
        e.preventDefault()
        var search = $(this).val();
        getReport(url + '?search=' + search)
    });

    function getReport(url) {
        $.ajax({
            type: "GET",
            url: url,
            cache: false,
            beforeSend: function () {
                $('#load-icon').show();
            },
            success: function (response) {
                $('#load-icon').hide();  
                $('#content-report').html(response); 
                $('ul.pagination a').click(function (e) { 
                e.preventDefault();
                var href = $(this).attr('href');
                getReport(href)
                });
            }
        });
    }

    function blockResponse(e, id) {
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
        confirmButtonText: 'Yes, block it!',
        cancelButtonText: 'Cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "PUT",
                url: "{{ url('admin/report') }}/"+id,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status == true) {
                        swalWithBootstrapButtons.fire(
                        'Blocked!',
                        'Response has been blocked.',
                        'success'
                        )   
                    } else {
                        swalWithBootstrapButtons.fire(
                        'Error!',
                        'This response cant be blocked',
                        'error'
                        )
                    }
                    getReport(url)
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

    function blockResponse(e, id) {
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
        confirmButtonText: 'Yes, block it!',
        cancelButtonText: 'Cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "PUT",
                url: "{{ url('admin/report') }}/"+id,
                data: {
                    status : 1,
                },
                cache: false,
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status == true) {
                        swalWithBootstrapButtons.fire(
                        'Blocked!',
                        'Response has been blocked.',
                        'success'
                        )   
                    } else {
                        swalWithBootstrapButtons.fire(
                        'Error!',
                        'This response cant be blocked',
                        'error'
                        )
                    }
                    getReport(url)
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

    function unblockResponse(e, id) {
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
        confirmButtonText: 'Yes, unblock it!',
        cancelButtonText: 'Cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "PUT",
                url: "{{ url('admin/report') }}/"+id,
                data: {
                    status : 1,
                },
                cache: false,
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status == true) {
                        swalWithBootstrapButtons.fire(
                        'Unblocked!',
                        'Response has been UNblocked.',
                        'success'
                        )   
                    } else {
                        swalWithBootstrapButtons.fire(
                        'Error!',
                        'This response cant be unblocked',
                        'error'
                        )
                    }
                    getReport(url)
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

    function deleteReport(e, id) {
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
                url: "{{ url('admin/report') }}/"+id,
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
                    getReport(url)
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