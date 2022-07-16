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
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <a class="btn  btn-primary" href="{{ Route('category-create') }}">Create</a>
                    <table class="table" id="table-index">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Created_at</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/rg-1.2.0/sc-2.0.7/sb-1.3.4/sl-1.4.0/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/rg-1.2.0/sc-2.0.7/sb-1.3.4/sl-1.4.0/datatables.min.js"></script>

<script>
    $(function() {
        $('#table-index').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('category.api') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' }

            ]
        });
    });
    </script>
@endpush

