@extends('layouts.main')
@section('content')
<div class="container-fluid">
  <form action="{{ url('profile/'.Auth::user()->id ) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="row">
      <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
          <div class="card-header">Profile Picture</div>
          <div class="card-body text-center">
            <!-- Profile picture image-->
            <img class="img-account-profile rounded-circle mb-2" id="image-profile"
              src="{{ Auth::user()->foto ? asset('img/profile/'.Auth::user()->foto) : asset('img/profile/default.jpg') }}"
              alt="" style="aspect-ratio: 1/1;">
            <!-- Profile picture help block-->
            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 2 MB</div>
            <!-- Profile picture upload button-->
            <div class="custom-file">
              <input class="custom-file-input" type="file" id="customFile" accept="image/*">
              <label class="custom-file-label" for="customFile">Choose File</label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
          <div class="card-header">Account Details</div>
          <div class="card-body">
            <div class="mb-3">
              <label for="full_name">Full Name</label>
              <input class="form-control @error('full_name') is-invalid @enderror" id="full_name" type="text" required
                placeholder="Full Name" name="full_name" value="{{ Auth::user()->full_name }}">
              @error('full_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="username">Username</label>
              <input class="form-control @error('username') is-invalid @enderror" id="username" type="text" required
                placeholder="Username" name="username" value="{{ Auth::user()->username }}">
              @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email">Email address</label>
              <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" required
                placeholder="Email" name="email" value="{{ Auth::user()->email }}">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password">Password</label>
              <input class="form-control @error('password') is-invalid @enderror" id="password" type="text"
                placeholder="Password" name="password">
              <span>*please empty the password if you don't want to change it</span>
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="no_handphone">No Handphone</label>
              <input class="form-control @error('no_handphone') is-invalid @enderror" id="no_handphone" type="tel"
                required placeholder="No Handphone" name="no_handphone" value="{{ Auth::user()->no_handphone }}">
              @error('no_handphone')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <a href="{{ url('/') }}" class="btn btn-outline-primary">Cancel</a>
            <button type="submit" class="btn btn-outline-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
@section('scripts')
<script>
  function readURL (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
      $('#image-profile').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
      
    }
    }

    $("#customFile").change(function() {
      readURL(this);
    });

</script>
@endsection