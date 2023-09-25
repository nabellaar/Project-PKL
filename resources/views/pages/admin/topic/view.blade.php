@extends('layouts.main')
@section('content')
<div class="container-fuild m-4">
    <div class="card shadow mb-4 col-lg-12 col-md-12">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
            <div class="dropdown no-arrow">
                <img class="rounded-circle" width="50px" style="aspect-ratio: 1/1;"
                    src="{{ $topic->user->foto ? asset('img/profile/'.$topic->user->foto) :asset('img/profile/default.jpg') }}"
                    alt="">
                <h5 class="view-name">{{ $topic->user->username }}</h5>
                <p class="view-date">{{ date('d M Y', strtotime($topic->updated_at)) }}</p>
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </a>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <h5 class="view-title">{{ $topic->title }}</h5>
            <p class="user-content">{{ $topic->content }}</p>
            <div class="mb-3">
                <img src="{{ asset('img/'.$topic->image) }}" alt="" width="300px">
            </div>
            <a class="btn btn-outline-primary btn-sm" href="{{ route('admin.topic.index')}}"><i class="fa-solid fa-arrow-left"></i>&nbsp;Back</a>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    .view-name {
        margin-left: 55px;
        margin-top: -42px;
    }
    .view-date {
        margin-left: 55px;
        margin-top: -5px;
        font-size: 12px;
    }
    .view-title {
        color:#435AE7 ;
    }
</style>
@endsection