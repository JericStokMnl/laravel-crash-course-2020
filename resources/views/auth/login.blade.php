@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-7 mx-auto">
        <div class="rounded shadow d-block px-4 py-5">
            <form class="needs-validation" novalidate method="POST" action="">
                @csrf
                @if (session('status'))
                    <div class="fade show p-2 bg-danger rounded-2 text-white text-center mb-3" role="alert">
                            <strong>Oops!</strong>    {{ session('status') }}
                    </div>
                @endif
                <div class="form-group mb-3">
                    <label for="name">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" id="email" placeholder="Your email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : (old('email') ? ' is-valid' : '') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="name">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : (old('email') ? ' is-valid' : '') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection
