@extends('.layouts.app') 
@section('content')
<h1>Shipping address</h1>
<form action="">
    @csrf {{-- Name --}}
    <div class="form-group row">

        <div class="col-md-6">
            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                required autofocus> @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
            </span> @endif
        </div>
    </div>

    <div class="form-group row">

        <div class="col-md-6">
            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                required autofocus> @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
            </span> @endif
        </div>
    </div>
</form>
@endsection