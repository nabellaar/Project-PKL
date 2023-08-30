<div class="p-alert">
    @if (Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    @if (Session::get('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
</div>