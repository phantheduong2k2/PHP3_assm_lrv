@extends('layout.master')
@section('col-sm-12')
    <div class="card">
        <div class="card-header">
            <h3>Add User</h3>
        </div>
        <div class="card-body">
            <form action="{{ Route('user-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email người dùng</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mật khẩu người dùng</label>
                    <input type="password" class="form-control" name="password" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Avatar</label>
                    <input type="file" class="form-control" name="avatar" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><h5>Level của người dùng</h5> </label>
                    <select name="level" class="form-control"  id="inputState">
                        <option value="0">Khách hàng</option>
                        <option value="1"">Nhân viên</option>
                        <option value="2">Quản trị</option>
                    </select>
                </div>
                <button type="reset" class="btn btn-primary">Reset</button>
                <a class="btn btn-primary" href="{{ Route('user-list') }}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
