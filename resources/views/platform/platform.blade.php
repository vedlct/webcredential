@extends('main')
@section('content')
    <!-- Add Company Modal -->
    <div class="modal fade" id="addPlatform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Add Platform</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('platform.insert') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Platform</label>
                                    <input class="form-control" type="text" name="PlatformName" required>
                                </div>
                            </div>
                        </div>

                        @if($errors->any())
                            @foreach($errors->all() as $error)

                                <div class="alert alert-danger">{{ $error}}</div>

                            @endforeach

                        @endif
                        <div class="m-t-20 text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Add Platform</button>
                        </div>
                    </form>
                </div>




            </div>
        </div>
    </div>




    <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Platform</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="editModalBody">
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Platform</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <button type="button" class="btn btn btn-primary btn-rounded float-right" data-toggle="modal" data-target="#addPlatform">
                <i class="fa fa-plus"></i> Add Platform
            </button>
            {{--<a href="{{route('appointment.add')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Service</a>--}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table" id="myTable">
                    <thead>
                    <tr>
                        <th>Paltform Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                    "url": "{!! route('platform.show') !!}",
                    "type": "POST",
                    data: function (d) {
                        d._token = "{{csrf_token()}}";
                    },
                },
                columns: [
                    {data: 'PlatformName', name: 'PlatformName'},
                    {
                        "data": function (data) {
                            return '&nbsp;&nbsp;<a style="cursor: pointer; color: rgba(236,39,50,0.98)" data-panel-id="' + data.PlatformId + '" onclick="delete_data(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;&nbsp; <a style="cursor: pointer; color: #4881ecfa" data-panel-id2="' + data.PlatformId + '" onclick="edit_data(this)"><i class="fa fa-edit" aria-hidden="true"></i></a>';},
                        "orderable": false, "searchable": false, "name": "action"},
                ],
            });
        });
        function edit_data(x) {
            id = $(x).data('panel-id2');
            $.ajax({
                type: 'POST',
                url: "{!! route('platform.edit') !!}",
                cache: false,
                data: {
                    _token: "{{csrf_token()}}",
                    'PlatformId': id,
                },
                success: function (data) {
                    $('#editModalBody').html(data);
                    $('#editModal').modal('show');
                }
            });
        }
        function delete_data(x) {
            var id = $(x).data('panel-id');
            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure want to delete!',
                buttons: {
                    confirm: function () {

                        $.ajax({
                            type: 'POST',
                            url: "{!! route('platform.delete') !!}",
                            cache: false,
                            data: {
                                _token: "{{csrf_token()}}",
                                PlatformId: id
                            },
                            success: function () {
                                $.alert({
                                    title: 'Success!',
                                    content: 'Platform Deleted.',
                                });
                                table.ajax.reload();
                            }
                        });
                    },
                    cancel: function() {
                    }
                }
            });
        }
    </script>

    <script type="text/javascript">
        @if (count($errors) > 0)
        $('#addPlatform').modal('show');
        @endif
    </script>
@endsection
