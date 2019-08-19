@if ( count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
@endif

@if ( session('error') )
    <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif