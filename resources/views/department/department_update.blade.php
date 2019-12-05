<form action="{{ route('department.update',$department->DepartmentId)}}" name="DepartmentId" method="POST" >
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Department Name</label>
                <input class="form-control" type="text" name="DepartmentName" value="{{ $department->DepartmentName}}">
            </div>
        </div>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)

            <div class="alert alert-danger">{{ $error}}</div>

        @endforeach

    @endif
    <div class="m-t-20 text-center">
        <button type="submit" class="btn btn-primary submit-btn">Update Department</button>
    </div>

</form>
