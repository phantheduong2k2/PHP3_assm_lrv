{{-- kien tra xem dang dung layout nao --}}

@extends('layout.master')

{{-- noi thay doi hien thi gi --}}
@section('tile', 'Dang ki thong tin')

@section('col-sm-12')
<div class="card">
    <div class="card-header">
        <h3>ADD REGISTER</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('regis-success') }}" method="GET">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
