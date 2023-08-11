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
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/') }}">
            <span class="mx-3">Home</span>
        </a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/topic') }}">
            <span class="mx-3">My Topics</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/my_answers') }}">
            <span class="mx-3">My Answers</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/liked_topics') }}">
            <span class="mx-3">Liked Topics</span>
        </a>
    </li>
    <!-- Button to trigger the modal -->
    <button type="button" class="btn btn-primary p-2 justify-content-center mx-4 my-3" data-toggle="modal"
        data-target="#commentModal1" style="border-color: #435AE7; background-color: #fff; color: #435AE7;">
        + Create a New Topic
    </button>
    <!-- Modal -->
    <div class="modal fade" id="commentModal1" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel"
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
</ul>
<!-- End of Sidebar -->