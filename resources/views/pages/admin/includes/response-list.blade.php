<table class="table datatable-table mt-4" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Response</th>
                <th>Content</th>
                <th>Owner</th>
                <th>Posted at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($response as $item)  
            <tr>
                <td>{{ ($response->currentpage()-1) * $response->perpage() + $loop->index + 1 }}</td>
                <td>{{$item->user->username}}</td>
                <td>{!! $item->content !!}</td>
                <td>{{$item->topic->content}}</td>
                <td>{{$item->topic->user->username}}</td>
                <td>{{$item->created_at}}</td>
                <td>
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteResponse(event, {{$item->id}}, '{{$item->title}}')"><i class="fa-solid fa-trash-can"></i>&nbsp; Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
<div class="float-right">
    {{ $response->appends($_GET)->links() }}
</div>
