@extends('main')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table" id="myTable">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Usertype</th>
                        <th>Department</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>


@endsection

@section('js')


    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ajax": {
                    "url": "{!! route('user.show') !!}",
                    "type": "POST",
                    data: function (d) {
                        d._token = "{{csrf_token()}}";
                    },
                },
                columns: [
                    {data: 'UserName', name: 'UserName'},
                    {data: 'usertype', name: 'usertype'},
                    {data: 'departmentname', name: 'departmentname'},
                    {
                        "data": function (data) {
                            return '&nbsp;&nbsp;<a style="cursor: pointer; color: rgba(236,39,50,0.98)" data-panel-id="' + data.PlatformId + '" onclick="delete_data(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;&nbsp; <a style="cursor: pointer; color: #4881ecfa" data-panel-id2="' + data.PlatformId + '" onclick="edit_data(this)"><i class="fa fa-edit" aria-hidden="true"></i></a>';},
                        "orderable": false, "searchable": false, "name": "action"},
                ],
            });
        });

    </script>



@endsection