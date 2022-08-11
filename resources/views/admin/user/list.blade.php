@extends('layout.master')
@section('col-sm-12')
    <div class="card">
        <div class="card-header">
            <h3 class="tile-header">List user</h3>
        </div>
        <div class="card-body">
            <caption>
                <form action="{{ Route('user-list') }}" method="get">
                    @csrf
                    <input class="form-control" value="{{ $name }}" placeholder="Tim Kiem" type="search"
                        name="name">
                </form>
            </caption>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <a class="btn  btn-primary" href="{{ Route('user-create') }}">Create</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Level</th>
                            <th>Chuc nang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <img src="{{ asset($item->avatar) }}" width="100" alt="">
                                </td>
                                <td>
                                    @if ($item->level == 2)
                                    <span>Quản trị</span>
                                    @elseif ($item->level == 1)
                                        <a href="{{ Route('user-updateLevel', $item->id) }}" class="btn btn-success">Nhân viên</a>
                                    @elseif ($item->level == 0)
                                    <a href="{{ Route('user-updateLevel', $item->id) }}" class="btn btn-danger">Khách hàng</a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn  btn-info" href="">Edit</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate">
                    {{ $user_list->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
