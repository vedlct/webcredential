@extends('main')
@section('content')

    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Department List</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{route('department.add')}}" class="btn btn btn-primary btn-rounded float-right"><i
                    class="fa fa-plus"></i> Add Schedule</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="showdepartment" class="table table-border table-striped custom-table mb-0">
                    <thead>
                    <tr>
                        <th>Department Name</th>


                        <th>Action</th>

                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>






@endsection

@section('js')

    <script type="application/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            table = $('#showdepartment').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url: "{!! route('department.show') !!}",
                    type: "POST",
                    data: function (d) {
                        d._token = "{{csrf_token()}}";
                    },
                },
                columns: [

                    {data: 'DepartmentName', name: 'DepartmentName'},
                    { "data": function(data) {
                            return '&nbsp;&nbsp;<a style="cursor: pointer; color: #4881ecfa" data-panel-id="'+data.DepartmentId+'"onclick="deleteDepartment(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;&nbsp;<a style="cursor: pointer; color: #4881ecfa" data-panel-id2="'+data.DepartmentId+'"onclick="editDepartment(this)"><i class="fa fa-edit" aria-hidden="true"></i></a> ';
                        },
                        "orderable": false, "searchable":false, "name":"action"
                    },

                ],

            });
        });

        </script>


@endsection
