      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title"><i class="fas fa-user-edit"></i> Edit user account</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form method="POST" action="{{ route('update.user') }}">
                      <div class="modal-body">
                          @csrf
                          <input type="hidden" name="id" value="{{ $user->id }}">
                          @if($user->id != Auth::user()->id)
                          <div class="form-group">
                              <label for="name">{{ __('Name') }}</label>
                              <input id="name" type="text" class="form-control" value="{{ $user->name }}" readonly>
                          </div>
                          <div class="form-group clearfix text-center">
                              <div class="icheck-primary  d-inline" style="margin-right:1rem;">
                                  <input type="radio" id="male" {{ $user->gender == 'Male' ? 'checked' : ''}} disabled>
                                  <label for="male"> {{ __('Male') }}
                                  </label>
                              </div>
                              <div class="icheck-primary  d-inline">
                                  <input type="radio" id="female" {{ $user->gender == 'Female' ? 'checked' : ''}} disabled>
                                  <label for="female">{{ __('Female') }}
                                  </label>
                              </div>
                              @error('gender')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="email">{{ __('Email Address') }}</label>
                              <input type="email" id="email" class="form-control" value="{{ $user->email ? $user->email : '' }}" readonly>
                          </div>
                          <div class="form-group">
                              <label for="mobile">{{ __('Mobile') }}</label>
                              <input type="number" id="mobile" class="form-control" value="{{ $user->mobile ? $user->mobile : '' }}" readonly>
                          </div>
                          <div class="form-group">
                              <label>{{ __('Usre Roles') }}</label>
                              <select name="role" class="custom-select @error('role') is-invalid @enderror" required>
                                  <option value="1" {{ $user->role == 1 ? 'selected' : ''}}>{{ __('Administration') }}</option>
                                  <option value="2" {{ $user->role == 2 ? 'selected' : ''}}>{{ __('Costmer') }}</option>
                              </select>
                              @error('role')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="form-group clearfix text-center">
                              <div class="icheck-success d-inline" style="margin-right:1rem;">
                                  <input type="radio" name="account_status" id="enabled" value="1" {{ $user->account_status == 1 ? 'checked' : ''}} required>
                                  <label for="enabled">
                                      {{ __('Account Enabled') }}
                                  </label>
                              </div>
                              <div class="icheck-danger  d-inline">
                                  <input type="radio" name="account_status" id="disabled" value="0" {{ $user->account_status == 0 ? 'checked' : ''}} required>
                                  <label for="disabled">
                                      {{ __('Account Disabled') }}
                                  </label>
                              </div>
                          </div>
                          @else
                          <div class="form-group">
                              <label for="name">{{ __('Name') }}</label>
                              <input placeholder="{{ __('Name') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ? $user->name : 'No data' }}" required autocomplete="name" autofocus>
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="form-group clearfix text-center">
                              <div class="icheck-primary  @error('gender') is-invalid @enderror d-inline" style="margin-right:1rem;">
                                  <input type="radio" id="male" name="gender" value="Male" {{ $user->gender == 'Male' ? 'checked' : ''}} required>
                                  <label for="male"> {{ __('Male') }}
                                  </label>
                              </div>
                              <div class="icheck-primary  @error('gender') is-invalid @enderror d-inline">
                                  <input type="radio" id="female" name="gender" value="Female" {{ $user->gender == 'Female' ? 'checked' : ''}} required>
                                  <label for="female">{{ __('Female') }}
                                  </label>
                              </div>
                              @error('gender')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="email">{{ __('Email Address') }}</label>
                              <input type="email" id="email" class="form-control " value="{{ $user->email ? $user->email : 'No data' }}" readonly>
                          </div>
                          <div class="form-group">
                              <label for="mobile">{{ __('Mobile') }}</label>
                              <input type="number" id="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $user->mobile ? $user->mobile : 'No data' }}" required autocomplete="mobile" placeholder="{{ __('Mobile') }}">
                              @error('mobile')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label>{{ __('Usre Roles') }}</label>
                              <select class="custom-select" disabled>
                                  <option {{ $user->role == 1 ? 'selected' : ''}}>{{ __('Administration') }}</option>
                                  <option {{ $user->role == 2 ? 'selected' : ''}}>{{ __('Costmer') }}</option>
                              </select>
                          </div>
                          <div class="form-group clearfix text-center">
                              <div class="icheck-success d-inline" style="margin-right:1rem;">
                                  <input type="radio" name="account_status" id="enabled" {{$user->account_status == 1 ? 'checked' : ''}} disabled>
                                  <label for="enabled">
                                      {{ __('Account Enabled') }}
                                  </label>
                              </div>
                              <div class="icheck-danger  d-inline">
                                  <input type="radio" name="account_status" id="disabled" {{$user->account_status == 0 ? 'checked' : ''}}disabled>
                                  <label for="disabled">
                                      {{ __('Account Disabled') }}
                                  </label>
                              </div>

                          </div>
                          @endif
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="submit" class="btn btn-warning">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                      </div>
                  </form>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->