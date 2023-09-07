@foreach ( $answer as $item )
<div class="container-fuild">
    <div class="col-xl-12 col-lg-7">
        <div class="row">
            <div class="card shadow mb-4 col-lg-12 col-md-12">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                    <div class="dropdown no-arrow">
                        <img style="height :50px; " class="rounded-circle"
                            src="{{ $item->user->foto ? asset('img/profile/'.$item->user->foto) :asset('img/profile/default.jpg') }}"
                            alt="">
                        <h5 style="margin-left: 60px; color:#000; margin-top: -45px; font-size: 15px;">{{
                            $item->user->username }}</h5>
                        <p style="margin-left: 60px; font-size: 12px;">{{ date('d M Y', strtotime($item->updated_at)) }}</p>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h5 style="color: #435AE7;">{{ $item->title }}</h5>
                    <p style="color:#000; font-size: 15px;">{{ $item->content }}</p>
                    <div class="text-center">
                        <img src="{{ asset('img/'.$item->image) }}" alt="" class="img-fluid">
                    </div>
                    <p style="color :#435AE7; font-size: 15px; margin-top: 35px;">{{ $item->response->count() }} Answer</p>
                    <hr>
                    @foreach ($item->response as $response )
                    <img style="height: 50px; margin-left: 20px;" class="rounded-circle"
                        src="{{ $response->user->foto ? asset('img/profile/'.$response->user->foto) : asset('img/profile/default.jpg') }}" alt="">
                                            <h5 style=" font-size: 15px; color: #000; margin-left: 80px; margin-top:
                        -40px;">{{ $response->user->username }}</h5>
                    <p style="font-size: 12px; margin-left: 80px; margin-top: -5px;">{{ date('d M Y',
                        strtotime($response->updated_at))}}</p>
                    <p style="margin-top: -45px; margin-left: 20%; font-size: 12px; color: #435AE7;">My Answer</p>
                    <p style="color: #000; margin-left: 20px; font-size: 15px; margin-top: 35px;">{!! $response->content !!}
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
{{ $answer->appends($_GET)->links() }}