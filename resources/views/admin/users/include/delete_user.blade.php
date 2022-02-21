      <div class="modal fade" id="modal-delete">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title"><i class="fas fa-trash-alt"></i> Delete user account</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body text-center">
                      <div class="alert alert-danger" role="alert">
                          <i class="fas fa-exclamation-triangle"></i> Are you sure you want to delete the user account ?
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <form action="{{ route('admin.users.delete') }}" method="POST">
                          @csrf
                          <input type="hidden" name="delete_user" value="{{$user->id}}">
                          <button type="submit" class="btn btn-danger">Yes,delete</button>
                      </form>
                      <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                  </div>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->