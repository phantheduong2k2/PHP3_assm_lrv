@extends('layout.master');
@section('col-sm-12')
<div class="card">
    <div class="card-header">
        <h3>Add category</h3>
    </div>
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

@endif
    <div class="card-body">
        <form action="{{ Route('category-store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <a class="btn btn-primary" href="{{ Route('category-list') }}">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>


@endsection
