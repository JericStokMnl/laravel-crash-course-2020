@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-7 mx-auto">
        <div class="rounded shadow d-block px-4 py-5">
            <form class="needs-validation" novalidate method="POST" action={{ route('register.store') }}>
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="name" placeholder="Your name" class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : (old('name') ? ' is-valid' : '') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="name">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" id="username" placeholder="Your username" class="form-control form-control-lg{{ $errors->has('username') ? ' is-invalid' : (old('username') ? ' is-valid' : '') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

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

                <div class="form-group mb-3">
                    <label for="name">Repeat password</label>
                    <input type="password" name="password_confirmation" id="password" placeholder="Repeat your password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : (old('password') ? ' is-valid' : '') }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
