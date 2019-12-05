<form action="{{ route('credential.update',$credential->Credentialid)}}" name="Credentialid" method="POST" >
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" name="Email" value="{{ $credential->Email}}" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" name="Username" value="{{ $credential->Username}}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="text" name="Password" value="{{ $credential->Password}}" required>
            </div>

            <div class="form-group">
                <label>RecoveryPhone</label>
                <input class="form-control" type="text" name="RecoveryPhone" value="{{ $credential->RecoveryPhone}}" required>
            </div>

            <div class="form-group">
                <label>WhoElseHasAccess</label>
                <input class="form-control" type="text" name="WhoElseHasAccess" value="{{ $credential->WhoElseHasAccess}}" required>
            </div>

            <div class="form-group">
                <label>WebsiteUrl</label>
                <input class="form-control" type="text" name="WebsiteUrl" value="{{ $credential->WebsiteUrl}}" required>
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
        <button type="submit" class="btn btn-primary submit-btn">Update Credential</button>
    </div>

</form>
