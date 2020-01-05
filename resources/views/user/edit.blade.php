<form method="post" action="{{route('user.update', ['id'=>$user->UserId])}}" enctype="multipart/form-data">
    {{csrf_field()}}
<div class="form-group">
    <label for="eventTitle">Name</label>
    <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
</div>
<div class="form-group">
    <label for="eventTitle">Email </label>
    <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}">
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
            <option value="{{$dt->DepartmentId}}"  @if($user->fkDepartmentId == $dt->DepartmentId) selected @endif>{{$dt->DepartmentName}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="eventVenue">User Type</label>
    <select id="usertype" name="usertype" class="form-control">
        <option value="">Select</option>
        @foreach($usertype as $ut)
            <option value="{{$ut->UserTypeId}}" @if($user->fkUserTypeId == $ut->UserTypeId) selected @endif>{{$ut->UserType}}</option>
        @endforeach
    </select>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" >Save</button>
</div>
</form>