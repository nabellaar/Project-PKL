@extends('layouts.main')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart --> 
                        <div class="col-xl-8 col-lg-7">
                            <div class="row">
                                <div class="card shadow mb-4 col-lg-12 col-md-12">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                                        <div class="dropdown no-arrow">
                                            <img style="height :60px; " src="img/Nazalea.png" alt="">
                                            <h5
                                                style="margin-left: 70px; color:#000; margin-top: -50px; font-size: 17px;">
                                                Nazalea Jackson</h5>
                                            <p style="margin-left: 70px; font-size: 13px;">4d ago</p>
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <h5 style="color: #435AE7;">Just wanna ask</h5>
                                        <p style="color:#000; font-size: 15px;">What's the difference between HTML, CSS,
                                            and JavaScript, and how do they work together to build a web page?</p>
                                        <button class="p-2 justify-content-center my-3" style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px;" data-toggle="modal" data-target="#commentModal"><i class="fa-solid fa-share" style="color: #435ae7;"></i> Add Response</button>
                                        <button class="p-2 my-3 justify-content-center" style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px;"><i class="fa-solid fa-thumbs-up" style="color: #435ae7;"></i> Like</button>
                                        <a href="/all_response">
                                            <button class="p-2 my-3 justify-content-center" style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px; color: #435AE7; margin-left: 51%; margin-top: -17px">See all response ></button>
                                        </a>
                                        <p style="color: #435AE7; font-size: 15px;" class="my-1">15 Answers</p>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="commentModalLabel" style="color: #000000;">Add Response</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea class="form-control" rows="5" placeholder="Enter your response"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card shadow mb-4 col-lg-12 col-md-12">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                                        <div class="dropdown no-arrow">
                                            <img style="height :60px; " src="img/mark.png" alt="">
                                            <h5
                                                style="margin-left: 70px; color:#000; margin-top: -50px; font-size: 17px;">
                                                Mark Roll</h5>
                                            <p style="margin-left: 70px; font-size: 13px;">1d ago</p>
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <h5 style="color: #435AE7;">Question</h5>
                                        <p style="color:#000; font-size: 17px;">What is the first step in planning to create a website?</p>
                                        <button class="p-2 justify-content-center my-3" style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px;" data-toggle="modal" data-target="#commentModal"><i class="fa-solid fa-share" style="color: #435ae7;"></i> Add Response</button>
                                        <button class="p-2 my-3 justify-content-center" style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px;"><i class="fa-solid fa-thumbs-up" style="color: #435ae7;"></i> Like</button>
                                        <a href="/all_response">
                                            <button class="p-2 my-3 justify-content-center" style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px; color: #435AE7; margin-left: 51%; margin-top: -17px">See all response ></button>
                                        </a>
                                        <p style="color: #435AE7; font-size: 15px;" class="my-1">15 Answers</p>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="commentModalLabel" style="color: #000000;">Add Response</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea class="form-control" rows="5" placeholder="Enter your response"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4 col-lg-12 col-md-12">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                                        <div class="dropdown no-arrow">
                                            <img style="height :60px; " src="img/ben.png" alt="">
                                            <h5
                                                style="margin-left: 70px; color:#000; margin-top: -50px; font-size: 17px;">
                                                Ben Ten</h5>
                                            <p style="margin-left: 70px; font-size: 13px;">10h ago</p>
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                    <h5 style="color: #435AE7;">Just wanna ask</h5>
                                        <p style="color:#000; font-size: 17px;">What are the important design principles to consider in creating an attractive website?</p>
                                        <button class="p-2 justify-content-center my-3" style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px;" data-toggle="modal" data-target="#commentModal"><i class="fa-solid fa-share" style="color: #435ae7;"></i> Add Response</button>
                                        <button class="p-2 my-3 justify-content-center" style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px;"><i class="fa-solid fa-thumbs-up" style="color: #435ae7;"></i> Like</button>
                                        <a href="/all_response">
                                            <button class="p-2 my-3 justify-content-center" style="text-decoration: none; background-color: #fff; color: #435AE7; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px; color: #435AE7; margin-left: 51%; margin-top: -17px">See all response ></button>
                                        </a>
                                        <p style="color: #435AE7; font-size: 15px;" class="my-1">15 Answers</p>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="commentModalLabel" style="color: #000000;">Add Response</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea class="form-control" rows="5" placeholder="Enter your response"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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