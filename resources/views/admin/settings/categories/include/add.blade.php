      <div class="modal fade" id="modal-add-category">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Add Category</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form method="POST" action="{{ route('create.categories') }}">
                      @csrf
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="name">{{ __('Name') }}</label>
                              <input placeholder="{{ __('admin.Name Categories') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="name">{{ __('admin.description') }}</label>
                              <textarea placeholder="{{ __('admin.description') }}" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"></textarea>
                              @error('description')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="name">{{ __('admin.notes') }}</label>
                              <textarea placeholder="{{ __('admin.notes') }}" id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" name="notes" value="{{ old('notes') }}"></textarea>
                              @error('notes')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <div class="btn-group  btn-group-sm" role="group" aria-label="Basic">
                              <button type="submit" class="btn btn-success ">{{ __('Create') }}</button>
                              <button type="reset" class="btn btn-outline-light  ">{{ __('Reset') }}</button>
                          </div>
                          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                      </div>
                  </form>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->