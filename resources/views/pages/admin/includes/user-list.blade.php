<table class="table datatable-table" width="100%" cellspacing="0">
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
            <td>{{ ($user->currentpage()-1) * $user->perpage() + $loop->index + 1 }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->full_name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->role }}</td>
            <td>{{ $item->no_handphone }}</td>
            <td>
                <a class="btn btn-outline-success btn-sm"
                    href="{{ route('admin.user.edit', $item->id) }}"><i class="fa-regular fa-pen-to-square"></i>&nbsp; Edit</a>
                <button class="btn btn-outline-danger btn-sm"
                    onclick="deleteUser(event, {{$item->id}}, '{{$item->title}}')"><i class="fa-solid fa-trash-can"></i>&nbsp; Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="float-right">
    {{ $user->appends($_GET)->links() }}
</div>