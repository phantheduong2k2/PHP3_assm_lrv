@extends('layout.master');
@section('col-sm-12')
<div class="card">
    <div class="card-header">
        <h3>Danh sach category</h3>
    </div>
    <div class="card-body table-border-style">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $username }}</td>
                        <td>{{ $password }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
