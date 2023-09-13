@extends('layouts.main')
@section('content')
<div class="container-fuild m-2">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Topic</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.topic.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
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
                <a href="{{ route('admin.topic.index') }}" class="btn btn-outline-danger">Cancel</a>
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection