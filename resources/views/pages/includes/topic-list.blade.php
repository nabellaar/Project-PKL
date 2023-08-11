@foreach ($topic as $item)
<div class="card shadow mb-4 col-lg-12 col-md-12">
    <!-- Card Body -->
    <div class="card-body">
        <h5 style="color: #435AE7;">{{ $item->title }}</h5>
        <p style="color:#000; font-size: 15px; margin-top: 15px;">{{ $item->content }}</p>
        <hr style="margin-top: 30px;">
        <img class="rounded-circle" style="height: 30px;"
            src="{{ $item->user->foto ? asset('img/profile/'.$item->user->foto) : asset('img/profile/default.jpg') }}"
            alt="">
        <p style="font-size: 12px; margin-left: 35px; margin-top: -23px;">Posted by <span style="color: #435AE7;">{{
                $item->user->name }}</span></p>
        <p style="font-size: 12px; margin-left: 30%; margin-top: -33px;">{{ date('d M Y', strtotime($item->updated_at))
            }}</p>
        <p style="margin-left: 80%; margin-top: -30px; color: #435AE7; font-size: 15px;">see all
            response ></p>
    </div>
    <div class="card-footer">
        <button onclick="modalEdit({{$item->id}});">Edit</button>
        <button>Delete</button>
    </div>
</div>
@endforeach