@foreach ($topic as $item)
<div class="card shadow mb-4 col-lg-12 col-md-12">
    <!-- Card Body -->
    <div class="card-body">
        <h5 style="color: #435AE7">{{ $item->title }}</h5>
        <p style="color:#000; font-size: 15px; margin-top: 15px;">{{ $item->content }}</p>
        <div class="text-center">
            <img src="{{ asset('img/'.$item->image) }}" alt="" class="img-fluid">
        </div>
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
        <button class="btn-edit" onclick="modalEdit({{$item->id}});">Edit</button>
        <button class="btn-dlt" onclick="deleteTopic(event, {{$item->id}}, '{{$item->title}}')">Delete</button>
    </div>
</div>
@endforeach
@section('@style')
<style>
    .btn-edit {
        border-color: #435AE7;
        color: #435AE7;
        background-color: white;
        border-radius: 5px;
    }
    .btn-dlt {
        border-color: red;
        color: red;
        background-color: white;
        border-radius: 5px;
    }
    .btn-edit:hover {
        background-color: #435AE7;
        color: white;
    }
    .btn-dlt:hover {
        background-color: red;
        color: white;
    }
    .card-footer {
        background-color: white;
    }
</style>