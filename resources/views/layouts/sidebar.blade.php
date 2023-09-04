<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-text mx-3">Forume</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Divider -->
    <hr class="sidebar-divider">
    {{-- sidebar admin --}}
    @if (Auth::user()->role == 'admin')
    <li class="nav-item @if (Request::segment(2) == '' || Request::segment(2) == 'dashboard') active @endif">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Menu</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">From User :</h6>
                <a class="collapse-item" href="{{ url('admin/user')}}">User</a>
                <a class="collapse-item" href="{{ url('admin/topic')}}">Topic</a>
                <a class="collapse-item" href="/commentAdmin">Comment</a>
            </div>
        </div>
    </li>
    {{-- end sidebar admin --}}
    @else

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if (Request::segment(1) == '') active @endif">
        <a class="nav-link collapsed" href="{{ url('/') }}">
            <span class="mx-3"><i class="fa-solid fa-house"></i> Home</span>
        </a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item @if (Request::segment(1) == 'topic') active @endif">
        <a class="nav-link collapsed" href="{{ url('/topic') }}">
            <span class="mx-3"><i class="fa-solid fa-book"></i> My Topics</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if (Request::segment(1) == 'answer') active @endif">
        <a class="nav-link collapsed" href="{{ url('/answer') }}">
            <span class="mx-3"><i class="fa-solid fa-pen"></i> My Answers</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if (Request::segment(1) == 'likes') active @endif">
        <a class="nav-link collapsed" href="{{ url('/likes') }}">
            <span class="mx-3"><i class="fa-solid fa-thumbs-up"></i> Liked Topics</span>
        </a>
    </li>
    <!-- Button to trigger the modal -->
    <button type="button" class="btn btn-primary p-2 justify-content-center mx-4 my-3" data-toggle="modal"
        data-target="#addTopic" style="border-color: #435AE7; background-color: #fff; color: #435AE7;">
        <i class="fa-solid fa-plus"></i> Create a New Topic
    </button>
    @endif



</ul>
<!-- End of Sidebar -->