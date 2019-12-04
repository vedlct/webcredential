<form action="{{ route('platform.update',$platform->PlatformId)}}" name="PlatformId" method="POST" >
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Platform Name</label>
                <input class="form-control" type="text" name="PlatformName" value="{{ $platform->PlatformName}}">
            </div>
        </div>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)

            <div class="alert alert-danger">{{ $error}}</div>

        @endforeach

    @endif
    <div class="m-t-20 text-center">
        <button type="submit" class="btn btn-primary submit-btn">Update Platform</button>
    </div>

</form>
