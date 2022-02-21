      <div class="modal fade" id="modal-change_password">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">User password change</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form method="POST" action="{{ route('admin.users.change-password') }}">
                      @csrf
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="password">{{ __('Password') }} </label>
                              <input type="hidden" name="id" value="{{ $user->id }}">
                              <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" id="password" placeholder="{{ __('Password') }}" required>
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          <button type="cancel" class="btn btn-default" data-dismiss="modal">cancel</button>
                      </div>
                  </form>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->