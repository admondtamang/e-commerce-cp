<div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger container-fluid">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif @if(Session::has('message'))
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        {{Session::get('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif
</div>