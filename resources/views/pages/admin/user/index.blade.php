@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-outline-primary" href="{{ route('admin.user.create')}}">Create</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>No Handphone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->no_handphone }}</td>
                            <td>
                                <button class="btn btn-outline-primary">Edit</button>
                                <button class="btn btn-outline-primary">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {{ $user->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
