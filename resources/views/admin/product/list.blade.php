@extends('layout.master')
@section('col-sm-12')
<div class="card">
    <div class="card-header">
        <h3 class="tile-header">List product</h3>
    </div>
    <div class="card-body">
        <caption>
            <form action="{{ Route('product-list') }}" method="get" >
                @csrf
             <input class="form-control" value="{{ $name }}" placeholder="Tim Kiem" type="search" name="name">
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
                        <th>Trang thai</th>
                        <th>Chuc nang</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($product_list as $item )
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <img src="{{ asset($item->avatar) }}" width="100" alt="">
                    </td>
                   <td>
                     @if ($item->status == 0)
                     <button class="btn btn-success"  data-status="1"
                     data-id="{{ $item->id }}">Hien</button>
                     @else
                     <button class="btn btn-danger" data-status="0"
                     data-id="{{ $item->id }}">An</button>
                     @endif
                   </td>
                    <td>
                        <a class="btn btn-outline-warning" href="{{ Route('product-delete', $item->id) }}">Delete</a>
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
