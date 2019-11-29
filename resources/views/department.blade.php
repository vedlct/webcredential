@include('layouts.header')


<body>


<div class="dashboard-main-wrapper">


    @include('layouts.sidebar')

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">




{{--            <div class="col-sm-8 col-9 text-right m-b-20">--}}
{{--                <a href="{{ route('department.add') }}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Department</a>--}}
{{--            </div>--}}


        </div>
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Patients</h4>
            </div>

            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="departmenttable" class="table table-border table-striped custom-table mb-0">
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
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @section('js')
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(document).ready(function() {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    table = $('#departmenttable').DataTable({
                        processing: true,
                        serverSide: true,
                        stateSave: true,
                        "ajax": {
                            "url": "{!! route('department.show') !!}",
                            "type": "POST",
                            data: function (d) {
                                d._token = "{{csrf_token()}}";
                            },
                        },
                        columns: [
                            {data: 'DepartmentName', name: 'DepartmentName'},

                            {
                                "data": function(data) {
                                    return '&nbsp;&nbsp;<a style="cursor: pointer; color: red" data-panel-id="'+data.DepartmentId+'"onclick="deletedepartment(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; <a style="cursor: pointer; color: deepskyblue" data-panel-id2="'+data.DepartmentId+'"onclick="editdepartment(this)"><i class="fa fa-edit" aria-hidden="true"></i></a>';},
                                "orderable": false, "searchable":false, "name":"action" },
                        ],
                    });
                });
                function editdepartment(x)
                {
                    // var id = $(x).data('panel-id2');
                    var id = $(x).data('panel-id2');
                    var url = '{{route("department.edit", ":DepartmentId") }}';
                    // alert(id);
                    var newUrl = url.replace(':id', id);
                    window.location.href = newUrl;
                }
                function deletedepartment(x)
                {
                    var id = $(x).data('panel-id');
                    $.confirm({
                        title: "Confirm",
                        content: "Are You Sure?",
                        buttons: {
                            confirm: function () {
                                $.ajax({
                                    type: "post",
                                    url: "{{route( 'department.delete' )}}",
                                    data: {id: id},
                                    success: function (data) {
                                        // alert(data);
                                        $.alert({
                                            title: "Success",
                                            content: "Department Deleted"
                                        });
                                        table.ajax.reload();
                                    }
                                });
                            },
                            cancel:function () {
                            }
                        }
                    });
                }
            </script>
        @endsection







        </div>


@include('layouts.footer')


