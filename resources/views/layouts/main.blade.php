<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Forume</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    {{-- <style>
        .nav-fixed .topnav, #accordionSidebar {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
        }
        .topnav {
            padding-left: 0;
            height: 3.625rem;
            z-index: 1039;
            font-size: 0.9rem;
        }
        #accordionSidebar, #content .container-fluid {
            padding-top: 5rem;
        }
        #content .container-fluid {
            padding-left: 16rem;
        }

    </style> --}}
    <style>
        /* Make the sidebar fixed */
        #accordionSidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
        }

        /* Adjust the content wrapper to give space for the fixed sidebar */
        #content-wrapper {
            margin-left: 225px; /* Adjust this value based on your sidebar width */
            height: 100vh;
        }

        /* Adjust the top navbar to be fixed */
        .topbar {
            position: fixed;
            top: 0;
            right: 0;
            left: 225px; /* Adjust this value based on your sidebar width */
            z-index: 1030; /* To make sure it stays above the sidebar */
        }
        #content .p-alert {
            padding-top: 5rem;
        }
        
    </style>

    @yield('styles')
    
</head>

<body class="nav-fixed" id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layouts.navbar')
                @include('layouts.alert')
                @yield('content')

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addTopic" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel"
                aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('topic.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="commentModalLabel" style="color: #000000;">Create your topic</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="commentTitle" style="color: #435AE7;">Title</label>
                                    <input type="text" class="form-control" id="commentTitle" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="commentContent" style="color: #435AE7;">Content</label>
                                    <textarea class="form-control" id="commentContent" name="content" rows="5"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="commentImage" style="color: #435AE7;">Image</label>
                                    <input type="file" class="form-control" id="commentContent" name="image" accept="image/*">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
                <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

                <!-- Core plugin JavaScript-->
                <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

                <!-- Custom scripts for all pages-->
                <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

                <!-- Page level plugins -->
                <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>

                <!-- Page level custom scripts -->
                <script src="{{ asset('js/demo/chart-area-demo.js')}}"></script>
                <script src="{{ asset('js/demo/chart-pie-demo.js')}}"></script>
                <script src="{{ asset('js/jscroll.min.js')}}"></script>
                <script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
                @yield('scripts')
</body>

</html>