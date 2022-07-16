@extends('layout.master')
@section('col-sm-12')
<div class="card">
    <div class="card-header">
        <h3>Edit category</h3>
    </div>
    <div class="card-body">
        <form action="{{ Route('category-update',$categorys->id) }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
              <input type="text" class="form-control" name="name" value="{{ $categorys->name }}" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <a class="btn btn-primary" href="{{ Route('category-list') }}">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
</div>
@endsection
