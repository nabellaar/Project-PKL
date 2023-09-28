<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Topic</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger error-msg" role="alert" style="display: none">
                <ul></ul>
            </div>
            <form id="form-edit-topic" action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="commentTitle" style="color: #435AE7;">Title</label>
                    <input type="text" class="form-control" id="commentTitle" name="title" value="{{ $topic->title }}" required>
                </div>
                <div class="form-group">
                    <label for="commentContent" style="color: #435AE7;">Content</label>
                    <textarea class="form-control" id="commentContent" name="content" rows="5"
                        required>{{ $topic->content }}</textarea>
                </div>
                @if ($topic->status != 3)
                @if ($topic->status != 0)
                <div class="form-group">
                    <label for="commentContent" style="color: #435AE7;">Status</label>
                    <div class="form-check">
                        <input class="form-check-input" id="flexRadioDefault1" type="radio" name="status" value="1" @if($topic->status ==1) checked @endif>
                        <label class="form-check-label" for="flexRadioDefault1">Publish</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="flexRadioDefault2" type="radio" name="status" value="2" @if($topic->status ==2) checked @endif>
                        <label class="form-check-label" for="flexRadioDefault2">Draft</label>
                    </div>
                </div>
                @endif
                @endif
                <div class="form-group">
                    <label for="commentImage" style="color: #435AE7;">Image</label>
                    <input type="file" class="form-control" id="commentContent" name="image" accept="image/*">
                    <img src="{{ asset('img/' .$topic->image)}}" alt="" width="200px" class="mt-4 ml-2">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="button" onclick="saveUpdate({{$topic->id}})">Save changes</button>
        </div>
    </div>
</div>