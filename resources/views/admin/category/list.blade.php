@extends('layout.master')
@section('col-sm-12')
    <div class="card">
        <div class="card-header">
            <h3 class="tile-header">List category</h3>
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
            <caption>
                <form >
                 <input class="form-control" placeholder="Tim Kiem" type="search" name="q" value="{{ $search }}">
                </form>
            </caption>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <a class="btn  btn-primary" href="{{ Route('category-create') }}">Create</a>
                    <table class="table" id="table-index">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>san pham thuoc danh muc</th>
                                <th>Created_at</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($list_data as $item )
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @foreach ($item->products as $product )
                                         <ul>
                                            <li>{{ $product->name }}</li>
                                         </ul>
                                @endforeach
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a class="btn  btn-primary" href="{{ Route('category-edit', $item->id) }}">Edit</a>
                                <a class="btn  btn-primary" href="{{ Route('category-delete', $item->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="paginate">
                        {{ $list_data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



