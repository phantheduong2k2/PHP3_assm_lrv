@extends('layout.master')
@section('col-sm-12')
    <div class="card">
        <div class="card-header">
            <h3>Add attribute</h3>
        </div>
        @if (session('msg-suc'))
            <div class="alert alert-success" role="alert">
                {{ session('msg-suc') }}
            </div>
        @endif
        <div class="card-body">
            <form action="{{ Route('attribute-store') }}" method="POST">
                @csrf
                <div class="mb-3">
                        <label for="inputState" class="form-label">Ten thuoc tinh</label>
                        <select name="name" class="form-control" id="inputState">
                            <option value="color">Mau sac</option>
                            <option value="size">Size</option>
                        </select>
                </div>
                <div class="mb-3 value1" >
                    <label for="exampleInputEmail1" class="form-label">Giá trị</label>
                    <input type="color" class="form-control" name="value" id="v1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3 value2" style="display: none">
                    <label for="exampleInputEmail1" class="form-label">Giá trị</label>
                    <input type="text" class="form-control" name="" id="v2"
                        aria-describedby="emailHelp">
                </div>
                <button type="reset" class="btn btn-primary">Reset</button>
                <a class="btn btn-primary" href="{{ Route('attribute-list') }}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#inputState').change(function(event){
            var _ip =    $('#inputState').val();
            if(_ip == 'size'){
                $('.value2').show();
                $('#v2').attr({
                   name: 'value',
                });
                $('.value1').hide();
                $('#v1').attr({
                   name: '',
                });
            }else{
                $('.value1').show();
                $('#v1').attr({
                   name: 'value',
                });
                $('.value2').hide();
                $('#v2').attr({
                   name: '',
                });
            }
        })
</script>


@endsection
