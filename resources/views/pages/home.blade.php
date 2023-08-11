@extends('layouts.main')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- TopicHome --> 
                        <div class="col-xl-8 col-lg-7">
                            <div class="col-12 text-center" id="load-icon" style="display: none">
                                <img width="50px" src="{{ asset('img/loading.gif')}}" alt="">
                            </div>
                            <div class="row" id="content-topic">
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="row pl-2">
                                <div class="card shadow mb-4 col-lg-12 col-md-12">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header d-flex flex-row align-items-center justify-content-between bg-white">
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </a>
                                            <h5 style="color: #000;" class="pt-3">Trending Topic</h5>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <img style="height: 50px;" src="img/trending1.png" alt="">
                                        <p style="color: #000; margin-left: 60px; margin-top: -45px;">Ben Ten</p>
                                        <p style="margin-left: 60px; font-size: 10px; margin-top: -15px;">30min ago</p>
                                        <p style="color: #000; font-size: 15px;">How do I create a form with text input and
                                            a submit button using HTML?</p>
                                        <hr>
                                        <img style="height: 50px;" src="img/trending2.png" alt="">
                                        <p style="color: #000; margin-left: 60px; margin-top: -45px;">Kayla Asha</p>
                                        <p style="margin-left: 60px; font-size: 10px; margin-top: -15px;">1h ago</p>
                                        <p style="color: #000; font-size: 15px;">What are the important factors that must be
                                            considered in the security of a website?</p>
                                        <hr>
                                        <img style="height: 50px;" src="img/trending3.png" alt="">
                                        <p style="color: #000; margin-left: 60px; margin-top: -45px;">Fayyana Dara</p>
                                        <p style="margin-left: 60px; font-size: 10px; margin-top: -15px;">3h ago</p>
                                        <p style="color: #000; font-size: 15px;">What is HTML, and what role does it play in
                                            website creation?</p>
                                        <hr>
                                    </div>
                                </div>

                                <!-- CARD KEDUA -->
                                <div class="card shadow mb-4 col-lg-12 col-md-12">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header d-flex flex-row align-items-center justify-content-between bg-white">
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </a>
                                            <h5 style="color: #000;" class="pt-3">Top User</h5>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <img style="height: 45px; margin-bottom: 10px;" src="img/user1.png" alt="">
                                        <p style="color: #000; margin-left: 60px; font-size: 15px; margin-top: -45px;">Edison B</p>
                                        <p style="color: #435AE7; font-size: 10px; margin-top: -35px; margin-left: 90%">30k</p>
                                        <hr style="margin-top: 30px;">
                                        <img style="height: 45px; margin-bottom: 10px;" src="img/user2.png" alt="">
                                        <p style="color: #000; margin-left: 60px; font-size: 15px; margin-top: -45px;">Galen F</p>
                                        <p style="color: #435AE7; font-size: 10px; margin-top: -35px; margin-left: 90%">23k</p>
                                        <hr style="margin-top: 30px;">
                                        <img style="height: 45px; margin-bottom: 10px;" src="img/user3.png" alt="">
                                        <p style="color: #000; margin-left: 60px; font-size: 15px; margin-top: -45px;">Jerome K</p>
                                        <p style="color: #435AE7; font-size: 10px; margin-top: -35px; margin-left: 90%">19k</p>
                                        <hr style="margin-top: 30px;">
                                        <img style="height: 45px; margin-bottom: 10px;" src="img/user4.png" alt="">
                                        <p style="color: #000; margin-left: 60px; font-size: 15px; margin-top: -45px;">Nadiv M</p>
                                        <p style="color: #435AE7; font-size: 10px; margin-top: -35px; margin-left: 90%">15.5k</p>
                                        <hr style="margin-top: 30px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- End of Content Wrapper -->
@endsection
@section('styles')
<style>
    .user-name{
        margin-left: 70px; 
        color:#000; 
        margin-top: -50px; 
        font-size: 17px;
    }
</style>
@endsection
@section('scripts')
    <script>
        var url_topic =  "{{ route('data.topic') }}"

        getTopic(url_topic)

        function getTopic(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                beforeSend: function () {
                    $('#load-icon').show();
                },
                success: function (response) {
                 $('#load-icon').hide();  
                 $('#content-topic').html(response); 
                }
            });
        }
    </script>
@endsection