<form method="post" action="{{ route('platform.update') }}">
    @csrf
    <input type="hidden" value="{{ $platform->PlatformId }}" name="PlatformId">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Platform Name</label>
                <input class="form-control" type="text" name="PlatformName" value="{{ $platform->PlatformName}}">
            </div>
        </div>
    </div>
    <div class="m-t-20 text-center">
        <button type="submit" class="btn btn-primary submit-btn">Update Platform</button>
    </div>
</form>
