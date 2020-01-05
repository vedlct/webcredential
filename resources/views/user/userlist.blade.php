@extends('main')
@section('content')
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">User</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <button type="button" class="btn btn btn-primary btn-rounded float-right" data-toggle="modal" data-target="#adduser">
                <i class="fa fa-plus"></i> Add User
            </button>
            {{--<a href="{{route('appointment.add')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Service</a>--}}
        </div>
    </div>
    <div class="modal fade" id="adduser">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('user.insert')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="eventTitle">Name</label>
                            <input type="text" id="name" name="name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="eventTitle">Email </label>
                            <input type="email" id="email" name="email" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="eventDate">password</label>
                            <input type="text" id="password" name="password" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label for="eventDate">Confirm password</label>
                            <input type="text" id="password" name="password"  class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label for="eventVenue">Department</label>
                            <select id="usertype" name="departmentId" class="form-control">
                                <option value="">Select</option>
                                @foreach($department as $dt)
                                    <option value="{{$dt->DepartmentId}}">{{$dt->DepartmentName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="eventVenue">User Type</label>
                            <select id="usertype" name="usertype" class="form-control">
                                <option value="">Select</option>
                                @foreach($usertype as $ut)
                                    <option value="{{$ut->UserTypeId}}">{{$ut->UserType}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="facultyTable" class="table table-bordered table-striped ">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- The Edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update user</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="editModalBody">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                </div>

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
        $(document).ready( function () {

            $('#facultyTable').DataTable({
                processing: true,
                serverSide: true,
                Filter: true,
                stateSave: true,
                type:"POST",
                "ajax":{
                    "url": "{!! route('user.getdata') !!}",
                    "type": "POST",
                    "data":{ _token: "{{csrf_token()}}"},
                },
                columns: [

                    { data: 'name', name: 'name'},
                    { data: 'email', name: 'user.email'},
                    { data: 'UserType', name: 'usertype.UserType'},
                    { data: 'updated_at', name: 'updated_at'},
                    {
                        "data": function(data) {
                            return '&nbsp;&nbsp;<a style="cursor: pointer; color: rgba(236,39,50,0.98)" data-panel-id="'+data.UserId+'" onclick="delete_data(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;&nbsp; <a style="cursor: pointer; color: #4881ecfa" data-panel-id2="' + data.UserId + '" onclick="userEdit(this)"><i class="fa fa-edit" aria-hidden="true"></i></a>';},
                        "orderable": false, "searchable": false},


                ]

            });

        } );
        function userEdit(x){

            var id=$(x).data('panel-id2');

            $.ajax({
                type: 'POST',
                url: "{!! route('user.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': id},
                success: function (data) {
                    $("#editModalBody").html(data);
                    $('#editModal').modal();
                    // console.log(data);
                }
            });
        }

        function delete_data(x) {

        }

    </script>



@endsection
