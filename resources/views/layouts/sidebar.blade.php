<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Forume</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if (Request::segment(1) == '') active @endif">
        <a class="nav-link collapsed" href="{{ url('/') }}">
            <span class="mx-3">Home</span>
        </a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item @if (Request::segment(1) == 'topic') active @endif">
        <a class="nav-link collapsed" href="{{ url('/topic') }}">
            <span class="mx-3">My Topics</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if (Request::segment(1) == 'answer') active @endif">
        <a class="nav-link collapsed" href="{{ url('/answer') }}">
            <span class="mx-3">My Answers</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if (Request::segment(1) == 'likes') active @endif">
        <a class="nav-link collapsed" href="{{ url('/likes') }}">
            <span class="mx-3">Liked Topics</span>
        </a>
    </li>
    <!-- Button to trigger the modal -->
    <button type="button" class="btn btn-primary p-2 justify-content-center mx-4 my-3" data-toggle="modal"
        data-target="#addTopic" style="border-color: #435AE7; background-color: #fff; color: #435AE7;">
        + Create a New Topic
    </button>
    
</ul>
<!-- End of Sidebar -->