<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel"><i class="fa fa-user"></i> EDIT USER PROFILE</h4>
            </div>
            <form method="POST" action="{{ route('update.profile') }}" id="selectform" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input placeholder="{{ __('Name') }}" id="name" type="text" class="form-control @error('name') has-error @enderror" name="name" value="{{ $user->name ? $user->name : 'No data' }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span style="color: red;">
                            * {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-inline  @error('gender') has-error  @enderror text-center">
                        <div class="radio @error('gender') has-error @enderror">
                            <label>
                                <input type="radio" id="male" name="gender" value="Male" {{ $user->gender == 'Male' ? 'checked' : ''}} required>
                                {{ __('Male') }}
                            </label>
                        </div>
                        <div class="radio @error('gender') has-error @enderror">
                            <label>
                                <input type="radio" id="female" name="gender" value="Female" {{ $user->gender == 'Female' ? 'checked' : ''}} required>
                                {{ __('Female') }}
                            </label>
                        </div>
                        @error('gender')
                        <span style="color: red;">
                            * {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email Address') }}</label>
                        <input type="email" id="email" class="form-control" value="{{ $user->email ? $user->email : '' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="mobile">{{ __('Mobile') }}</label>
                        <input type="number" id="mobile" class="form-control @error('mobile') has-error @enderror" name="mobile" value="{{ $user->mobile ? $user->mobile : 'No data' }}" required autocomplete="mobile" placeholder="{{ __('Mobile') }}">
                        @error('mobile')
                        <span style="color: red;">
                            * {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group @error('picture') has-error @enderror">
                        <label for=" image">Picture</label>
                        <input type="file" id="image" name="picture" class="@error('picture') has-error @enderror">
                        @if(count($errors) <=0) <p class=" help-block">Upload your picture</p>
                            @endif
                            @error('picture')
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->