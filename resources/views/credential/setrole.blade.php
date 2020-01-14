<form  method="post"  action="{{ route('role.save',$credentials->Credentialid)}}" name="Credentialid">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
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

            @foreach($users as $user)
                <td><input type="checkbox" value="{{$user->name}}">{{$user->name}}</td>
            @endforeach


        </div>

    </div>


    <div class="m-t-20 text-center">
        <button type="submit" class="btn btn-primary submit-btn">Add Role</button>
    </div>
</form>
