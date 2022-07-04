@extends('layout.master');
@section('col-sm-12')
<div class="card">
    <div class="card-header">
        <h3>add category</h3>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Ten danh muc</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>


@endsection
