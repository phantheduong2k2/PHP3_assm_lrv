@extends('layout.master');
@section('col-sm-12')
    <div class="card">
        <div class="card-header">
            <h3>List category</h3>
        </div>
        @if (session('msg-suc'))
            <div class="alert alert-success" role="alert">
                {{ session('msg-suc') }}
            </div>
        @endif
        @if (session('msg-edit'))
            <div class="alert alert-success" role="alert">
                {{ session('msg-edit') }}
            </div>
        @endif
        @if (session('msg-dl'))
        <div class="alert alert-success" role="alert">
            {{ session('msg-dl') }}
        </div>
    @endif
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <a class="btn  btn-primary" href="{{ Route('category-create') }}">Create</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Created_at</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td><a class="btn  btn-outline-info" href="{{ Route('category-delete',$item->id) }}">Delete</a>
                                    <a class="btn  btn-success" href="{{ Route('category-edit',$item->id) }}">Edit</a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
