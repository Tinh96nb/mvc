<!-- Content -->
<div class="main">
  <div class="hipsum">
    <div class="jumbotron">
      <div class="box-title">
          <h2>Manager User</h2>
      </div>
      <p><a class="btn btn-success" data-toggle="modal" data-target="#show-add" role="button">
      <i class="fa fa-plus-circle" aria-hidden="true"></i> Add User
      </a></p>
      <table class="table table-bordered display" cellspacing="0" width="100%" id="dttable">
        <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Age</th>
                  <th>Active</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tfoot>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Age</th>
                  <th>Active</th>
                  <th>Action</th>
              </tr>
          </tfoot>
      </table>
    </div>
  </div>
  </div>
</div>
<!-- Modal Update-->
<div class="modal fade" id="show-update" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit User</h4>
        </div>
        <div class="modal-body">
            <form id="form-update">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Age</label>
                    <input type="text" class="form-control" id="age" name="age">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="save">Save</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<!-- Modal Add-->
<div class="modal fade" id="show-add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add User</h4>
        </div>
        <div class="modal-body">
            <form id="form-add">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Age</label>
                    <input type="text" class="form-control" id="age" name="age">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="save">Add</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- Modal Delete-->
<div class="modal fade" id="show-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Delete User</h4>
        </div>
        <div class="modal-body">
            <form id="form-delete">
                <input type="hidden" name="id" id="del-id">
                <p>Are you sure delete user <strong id="del-name"></strong>?</p>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="delete">Delete</button>
            </div>
            </form> 
        </div>
    </div>
  </div>
</div>
<?php require_once INC_ROOT .'/app/views/partials/js.php'; ?>
<script type="text/javascript">
  $(document).ready(function() {
    var datatable = $('#dttable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "<?php echo HTTP_ROOT ?>/admin/listuser",
          method: 'post'
        }
    });
    $('#show-update').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var currentRow = button.closest("tr");
      var id     = currentRow.find("td:eq(0)").text(); // get current row 1st TD value
      var name   = currentRow.find("td:eq(1)").text(); 
      var email  = currentRow.find("td:eq(2)").text();
      var gender = currentRow.find("td:eq(3)").text();
      var phone  = currentRow.find("td:eq(4)").text();
      var age    = currentRow.find("td:eq(4)").text();
      var modal = $(this);
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #gender').val(gender);
      modal.find('.modal-body #phone').val(phone);
      modal.find('.modal-body #phone').val(age);
    });
    /* Send request update Ajax*/
    $("#form-update").on( "submit", function( ) {
        event.preventDefault();
        $.ajax({
            url: '<?php echo HTTP_ROOT ?>/admin/update',
            type: 'post',
            data: $(this).serialize(),
        })
        .done(function(data) {
            if(data=='ok'){
                datatable.ajax.reload();
                $('#show-update').modal('hide');
                $.notify("Update success", "success");
            } else {
                datatable.ajax.reload();
                $('#show-update').modal('hide');
                $.notify(data, "warn");
            }
        })
        .fail(function() {
            datatable.ajax.reload();
            $('#show-update').modal('hide');
            console.log('err');
        })
    });

    $('#show-delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var currentRow = button.closest("tr");
        var id=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
        var name=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
        var modal = $(this);
        modal.find('.modal-body #del-name').html(name);
        modal.find('.modal-body #del-id').val(id);
    });
    /* Send request delete Ajax*/
    $("#form-delete").on( "submit", function( event ) {
        event.preventDefault();
        $.ajax({
            url: 'admin/delete',
            type: 'post',
            data: $(this).serialize(),
        })
        .done(function(data) {
            if(data==='ok'){
                datatable.ajax.reload();
                $('#show-delete').modal('hide');
                 $.notify("Delete success", "success");
            } else {
                datatable.ajax.reload();
                $('#show-delete').modal('hide');
                 $.notify(data, "warn");
            }
        })
        .fail(function() {
            datatable.ajax.reload();
            $('#show-delete').modal('hide');
            $.notify(data, "warn");
        })
    });

    // Ajax Add
    $("#form-add").on( "submit", function( event ) {
        event.preventDefault();
        $.ajax({
            url: 'admin/add',
            type: 'Post',
            data: $(this).serialize(),
        })
        .done(function(data) {
            if(data==='ok'){
                datatable.ajax.reload();
                $('#show-add').modal('hide');
                 $.notify("Add success", "success");
            } else {
                datatable.ajax.reload();
                $('#show-add').modal('hide');
                 $.notify(data, "warn");
            }
        })
        .fail(function() {
            datatable.ajax.reload();
            $('#show-add').modal('hide');
            $.notify(data, "success");
        });
    });
  });
</script>
