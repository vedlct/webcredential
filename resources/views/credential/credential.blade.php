@extends('main')
@section('content')
    <!-- Add Company Modal -->
    <div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Credentials</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('credential.insert') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="text" name="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="Username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="text" name="Password" required>
                                </div>
                                <div class="form-group">
                                    <label>Recovery Phone</label>
                                    <input class="form-control" type="text" name="RecoveryPhone" required>
                                </div>
                                <div class="form-group">
                                    <label>WhoElseHasAccess</label>
                                    <input class="form-control" type="text" name="WhoElseHasAccess">
                                </div>
                                <div class="form-group">
                                    <label>Web Site URL</label>
                                    <input class="form-control" type="text" name="WebsiteUrl" required>
                                </div>
                                <div class="form-group">
                                    <label>Platform Name</label>


                                    <select class="select" name="PlatformId" id="PlatformId" class="form-control"
                                            required>
                                        <option value="">Select</option>
                                        @foreach($platforms as $platform)
                                            <option
                                                value="{{$platform->PlatformId}}">{{$platform->PlatformName}}</option>
                                        @endforeach
                                    </select>


                                </div>

                            </div>
                        </div>

                        @if($errors->any())
                            @foreach($errors->all() as $error)

                                <div class="alert alert-danger">{{ $error}}</div>

                            @endforeach

                        @endif
                        <div class="m-t-20 text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Add Credential</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id="exampleModalLabel1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Update Credential</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="editModalBody">
                </div>
            </div>
        </div>
    </div>

    {{--    role set modal --}}

    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="roleModal">Add User roles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="editModalBody2">


                    <form id="frm_example" method="post" action="{{ route('role.save')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="ccid" name="ccid">
                                <input type="hidden" id="ccidm" name="ccidm[]">
                                <label>Department</label>


                                <select name="DepartmentId" id="department" class="form-control input-lg dynamic"
                                        data-dependent="state"> required>
                                    <option value="">Select</option>
                                    @foreach($departments as $department)
                                        <option
                                            value="{{$department->DepartmentId}}">{{$department->DepartmentName}}</option>
                                    @endforeach
                                </select>

                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-12">


                                <label>Users</label>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div id="userList"></div>


                                    </div>
                                </div>


                            </div>

                        </div>


                        <div class="m-t-20 text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Add Role</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


    {{--    role set modal end --}}
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Credential</h4>
        </div>


        <div class="col-sm-8 col-9 text-right m-b-20">
            <button type="button" class="btn btn btn-primary btn-rounded float-right" data-toggle="modal"
                    data-target="#addService">
                <i class="fa fa-plus"></i> Add Credential
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">


            <div class="table-responsive">
                <p><b>Selected row data</b></p>
            <pre id="view-rows"></pre>

                <form id="frm-example" action="{{ route('role.save')}}" method="POST">
                    <table class="table table-striped custom-table" id="myTable">
                        <thead>
                        <tr>

                            <th></th>

                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Recovery Phone</th>
                            <th>Access List</th>
                            <th>Website URL</th>
                            <th>Platform Name</th>
                            <th>Set role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <p><button type="button" class="btn btn-danger" id="roleButton" data-toggle="modal" data-target="#roleModal" data-panel-id5="'data.Credentialid'" onclick="setmultiplerows(this)">View Selected ID</button></p>

{{--                    <p>--}}
{{--                        <button type="button" id="roleButton" class="btn btn-primary" data-toggle="modal"  data-target="#roleModal" data-panel-id5="'data.Credentialid'" onclick="setmultiplerows(this)">Add Selected Credentials</button></p>--}}

                </form>
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
        $(document).ready(function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            table = $('#myTable').DataTable({
                'columnDefs': [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true
                        }
                    }
                ],
                'select': {
                    'style': 'multi'
                },
                'order': [[1, 'asc']],


                processing: true,
                serverSide: true,
                stateSave: true,
                "ajax": {
                    "url": "{!! route('credential.show') !!}",
                    "type": "POST",
                    data: function (d) {
                        d._token = "{{csrf_token()}}";
                    },
                },


                columns: [
                    {data: 'Credentialid', name: 'Credentialid'},
                    {data: 'Email', name: 'Email'},
                    {data: 'Username', name: 'Username'},
                    {data: 'Password', name: 'Password'},
                    {data: 'RecoveryPhone', name: 'RecoveryPhone'},
                    {data: 'WhoElseHasAccess', name: 'WhoElseHasAccess'},
                    {data: 'WebsiteUrl', name: 'WebsiteUrl'},
                    {data: 'platformname', name: 'platformname'},


                    {
                        "data": function (data) {
                            return '<button type="button" id="roleButton" class="btn btn-primary" data-toggle="modal"  data-target="#roleModal" data-panel-id="' + data.Credentialid + '" onclick="setrole(this)">' +
                                '  Set Roles\n' +
                                '</button> ';

                        },

                    },


                    {
                        "data": function (data) {
                            return '&nbsp;&nbsp;<a style="cursor: pointer; color: rgba(236,39,50,0.98)" data-panel-id2="' + data.Credentialid + '" onclick="delete_data(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;&nbsp; <a style="cursor: pointer; color: #4881ecfa" data-panel-id3="' + data.Credentialid + '" onclick="edit_data(this)"><i class="fa fa-edit" aria-hidden="true"></i></a>';

                        },

                    },
                ],

            });
        });




        function edit_data(x) {
            id = $(x).data('panel-id3');
            $.ajax({
                type: 'POST',
                url: "{!! route('credential.edit') !!}",
                cache: false,
                data: {
                    _token: "{{csrf_token()}}",
                    'Credentialid': id,
                },
                success: function (data) {
                    $('#editModalBody').html(data);
                    $('#exampleModalLabel1').modal('show');
                }
            });
        }

        function setrole(x) {
            $('#ccid').val($(x).data('panel-id'));

        }

        function setmultiplerows(rowId){



            $('#frm-example').on('submit', function (e) {
                var form = this;

                var rows_selected = table.column(0).checkboxes.selected();

                // Iterate over all selected checkboxes
                $.each(rows_selected, function (index, rowId) {


                    $('#ccidm').val($(rowId).data('panel-id5'));
                });
            });

        }


        function delete_data(x) {
            var id = $(x).data('panel-id2');
            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure want to delete!',
                buttons: {
                    confirm: function () {
                        // delete
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('credential.delete') !!}",
                            cache: false,
                            data: {
                                _token: "{{csrf_token()}}",
                                Credentialid: id
                            },
                            success: function () {
                                $.alert({
                                    // animationBounce: 2,
                                    title: 'Success!',
                                    content: 'Credential Deleted.',
                                });
                                table.ajax.reload();
                            }
                        });
                    },
                    cancel: function () {
                    }
                }
            });
        }
    </script>



    <script type="text/javascript">
        @if (count($errors) > 0)
        $('#addService').modal('show');
        @endif
    </script>


    <script !src="">
        $(document).ready(function () {
            $('select[name="DepartmentId"]').on('change', function () {
                var DepartmentId = $(this).val();

                if (DepartmentId > 0) {
                    // console.log(DepartmentId);
                    $.ajax({
                        url: '{{url('/getusers').'/'}}' + DepartmentId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            jQuery('#userList').empty();


                            $('select[name="UserId"]').empty();
                            $.each(data, function (key, value) {
                                $('#userList')
                                    .append('<td><label>' + value + '</label><input type="checkbox" value="' + key + '" name="UserId[]"></td>');
                            });


                        }
                    });


                }
            });


        });
    </script>


@endsection
