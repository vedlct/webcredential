<form action="{{ route('usertype.update',$usertype->UserTypeId)}}" name="UserTypeId" method="POST" >
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Usertype Name</label>
                <input class="form-control" type="text" name="UserType" value="{{ $usertype->UserType}}">
            </div>
        </div>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)

            <div class="alert alert-danger">{{ $error}}</div>

        @endforeach

    @endif
    <div class="m-t-20 text-center">
        <button type="submit" class="btn btn-primary submit-btn">Update Usertype</button>
    </div>

</form>
