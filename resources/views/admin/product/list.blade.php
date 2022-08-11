@extends('layout.master')
@section('col-sm-12')
    <div class="card">
        <div class="card-header">
            <h3 class="tile-header">List product</h3>
        </div>
        @if (session('msg-dl'))
        <div class="alert alert-success" role="alert">
            {{ session('msg-dl') }}
        </div>
    @endif
        <div class="card-body">
            <caption>
                <form action="{{ Route('product-list') }}" method="get">
                    @csrf
                    <input class="form-control" value="{{ $name }}" placeholder="Tim Kiem" type="search"
                        name="name">
                </form>
            </caption>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <a class="btn  btn-primary" href="{{ Route('product-create') }}">Create</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ten san pham</th>
                            <th>Gia</th>
                            <th>Image</th>
                            <th>San pham thuoc danh muc</th>
                            <th>Trang thai</th>
                            <th>Chuc nang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <img src="{{ asset($item->avatar) }}" width="100" alt="">
                                </td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <a href="{{ Route('product-updateStatus', $item->id) }}"
                                            class="btn btn-success">Hien</a>
                                    @else
                                        <a href="{{ Route('product-updateStatus', $item->id) }}"
                                            class="btn btn-danger">An</a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-outline-warning"
                                        href="{{ Route('product-delete', $item->id) }}">Delete</a>
                                    <a class="btn  btn-info" href="{{ Route('product-edit', $item->id) }}">Edit</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate">
                    {{ $product_list->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
