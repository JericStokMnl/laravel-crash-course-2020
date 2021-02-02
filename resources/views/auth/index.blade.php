@extends('layouts.app')
@section('content')
<div class="rounded shadow d-block p-3">
    <form class="needs-validation" novalidate method="POST" action="">
        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control is-invalid">
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Doesn't look good!
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
