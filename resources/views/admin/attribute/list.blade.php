@extends('layout.master')
@section('col-sm-12')
    <div class="card">
        <div class="card-header">
            <h3 class="tile-header">List attribute</h3>
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
        <div class="card-body">
            <a class="btn  btn-primary" href="{{ Route('attribute-create') }}">Create</a>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table" id="table-index">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Gia tri</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attr_list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->value }}</td>
                                    <td>
                                        <a class="btn  btn-primary"
                                            href="{{ Route('attribute-delete', $item->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate">
                        {{ $attr_list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
