@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row pt-5 mx-4">
        <div class="col-xl-4 col-lg-5 pt-5">
            <div class="card">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">User</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <h5 class="user-total">Total User</h5>
                        <p class="count-user"><i class="fa-solid fa-user"></i>{{ $user }}</p>

                        <h5 class="total-topic">Total Topic</h5>
                        <p class="count-topic"><i class="fa-solid fa-book"></i> {{ $topic }}</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5 pt-5">
            <div class="card">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Trending Topic</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @foreach ($trending as $trend)  
                    <img style="height: 50px;" class="rounded-circle" src="{{ $trend->user->foto ? asset('img/profile/'.$trend->user->foto) : asset('img/profile/default.jpg') }}" alt="">
                    <p class="user-admin">{{$trend->user->username}}</p>
                    <p class="date-trending">{{ date('d M Y', strtotime($trend->updated_at))}}</p>
                    <p class="content-admin">{{$trend->content}}</p>
                    {{$trend->likes_count}} likes
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5 pt-5">
            <div class="card">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Top User</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @foreach ($top_user as $top)
                    <img style="height: 50px;" class="rounded-circle" src="{{ $top->foto ? asset('img/profile/'.$top->user->foto) : asset('img/profile/default.jpg') }}" alt="">
                    <p class="top-user-admin">{{$top->username}}</p>
                    <p class="top-count-admin">{{$top->topic_count}} Topic</p>
                    <hr class="hr-top-admin">  
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection