<table class="table datatable-table mt-4" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Owner</th>
            <th>Report Content</th>
            <th>Username</th>
            <th>Reason</th>
            <th>Report Time</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($report as $item) 
        <tr>
            <td>{{ ($report->currentpage()-1) * $report->perpage() + $loop->index + 1 }}</td>
            <td>{{$item->user->username}}</td>
            <td>{{$item->content}}</td>
            <td>
                @foreach ($item->report as $r)
                   {{ $r->user->username }} <br>
                @endforeach
            </td>
            <td>
                @foreach ($item->report as $r)
                    {{ $r->reason }} <br>
                @endforeach
            </td>
            <td>
                @foreach ($item->report as $r)
                    {{ $r->created_at }} <br>
                @endforeach
            </td>
            <td>
                <button class="btn btn-outline-danger btn-sm" onclick="deleteReport(event, {{$item->id}}"><i class="fa-solid fa-trash-can"></i>&nbsp; Delete</button>
                <button class="btn btn-outline-dark btn-sm" onclick="blockUser(event, {{$item->user->id}})">Block</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="float-right">
{{ $report->appends($_GET)->links() }}
</div>