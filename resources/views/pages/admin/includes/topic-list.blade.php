<table class="table datatable-table" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Title Topic</th>
            <th>Content</th>
            <th>Owner</th>
            <th>Upload at</th>
            <th>Status</th>
            <th width="30%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($topic as $item)
        <tr>
            <td>{{ ($topic->currentpage()-1) * $topic->perpage() + $loop->index + 1 }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->content }}</td>
            <td>{{ $item->user->username }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                @if ($item->status == '0')
                <span class="badge bg-red">Blocked</span>
                @elseif ($item->status == '1')
                <span class="badge bg-green">Publish</span>
                @elseif ($item->status == '2')
                <span class="badge bg-orange">Draft</span>
                @elseif ($item->status == '3')
                <span class="badge bg-cyan">Requested</span>
                @endif
            </td>
            <td>
                <button class="btn btn-outline-blue btn-sm m-2"><i class="fa-solid fa-check"></i>&nbsp; Accept</button>
                <button class="btn btn-outline-orange btn-sm m-2"><i class="fa-solid fa-xmark"></i>&nbsp; Decline</button>
                <button class="btn btn-outline-info btn-sm m-2"><i class="fa-regular fa-eye"></i>&nbsp; View</button>
                <button class="btn btn-outline-success btn-sm m-2"><i class="fa-regular fa-pen-to-square"></i>&nbsp; Edit</button>
                <button class="btn btn-outline-danger btn-sm m-2"><i class="fa-solid fa-trash-can"></i>&nbsp; Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="float-right">
    {{ $topic->appends($_GET)->links() }}
</div>