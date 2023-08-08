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
                                        <button class="p-2 my-3 justify-content-center" style="text-decoration: none; background-color: #435AE7; color: #fff; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px;"><i class="fa-solid fa-thumbs-up"></i> Liked</button>
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
                                        <button class="p-2 my-3 justify-content-center" style="text-decoration: none; background-color: #435AE7; color: #fff; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px;"><i class="fa-solid fa-thumbs-up"></i> Liked</button>
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
                                        <button class="p-2 my-3 justify-content-center" style="text-decoration: none; background-color: #435AE7; color: #fff; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px;"><i class="fa-solid fa-thumbs-up"></i> Liked</button>
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
                                        <button class="p-2 my-3 justify-content-center" style="text-decoration: none; background-color: #435AE7; color: #fff; border-color:#435AE7 ;
                                            border-radius: 10px; font-size: 15px;"><i class="fa-solid fa-thumbs-up"></i> Liked</button>
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
            <!-- End of Page Wrapper -->
@endsection