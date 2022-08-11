@extends('layout.master')
@section('col-sm-12')
    <div class="card">
        <div class="card-header">
            <h3>Add product</h3>
        </div>
        <div class="card-body">
            <form action="{{ Route('product-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên san pham</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                        @if ($errors->has('name'))
                        <div class="alert alert-danger"><span>{{ $errors->first('name') }} </span></div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Gia san pham</label>
                    <input type="number" class="form-control" name="price" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                        @if ($errors->has('name'))
                        <div class="alert alert-danger"><span>{{ $errors->first('price') }} </span></div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Anh san pham</label>
                    <input type="file" class="form-control" name="avatar" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                        @if ($errors->has('avatar'))
                        <div class="alert alert-danger"><span>{{ $errors->first('avatar') }} </span></div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mo ta san pham</label>
                    <textarea class="form-control"  name="description" cols="20" rows="5"></textarea>
                    @if ($errors->has('description'))
                    <div class="alert alert-danger"><span>{{ $errors->first('description') }} </span></div>
                @endif
                </div>
                <div class="mb-3">
                    <label for="inputState" class="form-label">San pham thuoc danh muc</label>
                   <select name="categorie_id" class="form-control"  id="inputState">
                    @foreach ($cate_list as $item )
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                   </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><h5>Trang thai san pham</h5> </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="1" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            An san pham
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Hien san pham
                        </label>
                    </div>
                    @if ($errors->has('status'))
                    <div class="alert alert-danger"><span>{{ $errors->first('status') }} </span></div>
                @endif
                </div>
                <label for="exampleInputEmail1" class="form-label"><h5>Chọn thuộc tính cho sản phẩm</h5> </label>
                <div class="mb-3">
                    <label for="inputState" class="form-label"><h6>Màu sắc: </h6></label>
                    @foreach ($color as $item )
                    <label class="custom-control custom-radio custom-control-inline">
                        <input class="form-check-input" type="checkbox" value="{{  $item->id }}" name="attr_pro_id[]" >

                        <label class="form-check-label" for=""><span style="background-color: {{ $item->value }}" class="badge badge-primary">color</span></label>
                    </label>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="inputState" class="form-label"><h6>Size: </h6></label>
                    @foreach ($size as $item )
                    <label class="custom-control custom-radio custom-control-inline">
                        <input class="form-check-input" type="checkbox" value="{{  $item->id }}" name="attr_pro_id[]" >
                        <label class="form-check-label" for="">{{ $item->value }}</label>
                    </label>
                    @endforeach
                </div>
                <button type="reset" class="btn btn-primary">Reset</button>
                <a class="btn btn-primary" href="{{ Route('product-list') }}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
