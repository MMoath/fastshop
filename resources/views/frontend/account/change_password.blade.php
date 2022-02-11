    <div class="modal fade" id="modal-change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-change_password">User password change</h4>
                </div>
                <form method="POST" action="{{ route('change.password.profile') }}" id="selectform">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="password">{{ __('Password') }} </label>
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" id="password" placeholder="{{ __('Password') }}" required>
                            @error('password')
                            <span style="color: red;">
                                * {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <button type="button" onclick="document.getElementById('selectform').reset(); document.getElementById('from').value = null; return false;" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal -->