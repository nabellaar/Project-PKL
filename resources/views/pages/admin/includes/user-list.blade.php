<table class="table datatable-table mt-4" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>No Handphone</th>
            <th>Status</th>
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
                @if ($item->status == '0')
                <span class="badge bg-red">Blocked</span>
                @endif
                @if ($item->status == '1')
                <span class="badge bg-blue">Active</span>
                @endif
            </td>
            <td>
                @if ($item->status == '0')
                <a href="javascript:void(0)" onclick="unblockUser(event, {{$item->id}})" class="btn-status btn btn-outline-orange btn-sm m-2"><i class="fa-solid fa-xmark"></i>&nbsp; Unblock</a>
                @endif
                <a class="btn btn-outline-success btn-sm"
                    href="{{ route('admin.user.edit', $item->id) }}"><i class="fa-regular fa-pen-to-square"></i>&nbsp; Edit</a>
                @if ($item->status != '0')
                <button class="btn btn-outline-dark btn-sm" onclick="blockUser(event, {{$item->id}})"><i class="fa-solid fa-ban"></i>&nbsp;Block</button>   
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="float-right">
    {{ $user->appends($_GET)->links() }}
</div>