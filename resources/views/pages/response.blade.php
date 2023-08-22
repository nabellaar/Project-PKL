@extends('layouts.main')
@section('content')
<!-- MULAI CONTENT/ISI DISINI -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="row">
                <div class="card shadow mb-4 col-lg-12 col-md-12">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                        <div class="dropdown no-arrow">
                            <img class="rounded-circle" style="height :50px; " src="{{ $topic->user->foto ? asset('img/profile/'.$topic->user->foto) :asset('img/profile/default.jpg') }}" alt="">
                            <h5 style="margin-left: 60px; color:#000; margin-top: -45px; font-size: 15px;">
                                {{ $topic->user->username }}</h5>
                            <p style="margin-left: 60px; font-size: 12px;">{{ date('d M Y',
                                strtotime($topic->updated_at))
                                }}</p>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <h5 style="color: #435AE7;">{{ $topic->title }}</h5>
                        <p style="color:#000; font-size: 15px;">{{ $topic->content }}</p>
                        <p style="color :#435AE7; font-size: 15px; margin-top: 35px;">10 Answer</p>
                        <hr>
                        <img class="rounded-circle" style="height: 50px; margin-left: 20px;" src="{{ $topic->user->foto ? asset('img/profile/'.$topic->user->foto) :asset('img/profile/default.jpg') }}" alt="">
                        <h5 style="font-size: 15px; color: #000; margin-left: 80px; margin-top: -40px;">Monica David
                        </h5>
                        <p style="font-size: 12px; margin-left: 80px; margin-top: -5px;">4d ago</p>
                        <p style="color: #000; margin-left: 20px; font-size: 15px; margin-top: 25px;">Define the
                            objective, identify the audience, choose the domain name,
                            plan the content, design the look, and set the budget and timeline.</p>
                        <img class="rounded-circle" style="height: 50px; margin-left: 20px;" src="{{ $topic->user->foto ? asset('img/profile/'.$topic->user->foto) :asset('img/profile/default.jpg') }}" alt="">
                        <h5 style="font-size: 15px; color: #000; margin-left: 80px; margin-top: -40px;">Monica David
                        </h5>
                        <p style="font-size: 12px; margin-left: 80px; margin-top: -5px;">4d ago</p>
                        <p style="color: #000; margin-left: 20px; font-size: 15px; margin-top: 25px;">Define the
                            objective, identify the audience, choose the domain name,
                            plan the content, design the look, and set the budget and timeline.</p>
                    </div>
                    <!-- End of Page Wrapper -->
                    @endsection