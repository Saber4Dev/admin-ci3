
<?php
//Debug code 
//var_dump($clients); ?> 

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Clients</h3>
              <div class="box-tools">
              <button type="button" class="btn bg-olive btn-flat" data-toggle="modal" data-target="#addClientModal"><i class="fa fa-plus"></i> Add</button>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <!-- Client table -->
              <?php if (!empty($clients)) { ?>
                <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clients as $client): ?>
                                <tr>
                                    <td><?php echo $client->id; ?></td>
                                    <td><img src="<?php echo base_url('assets/admin_lte_assets/dist/img/' . $client->photo); ?>" alt="<?php echo $client->name; ?>" height="50"></td>
                                    <td><a href="<?php echo base_url('admin/user/client_profile/' . $client->id); ?>"><?php echo $client->name; ?></a></td>
                                    <td><?php echo $client->email; ?></td>
                                    <td><?php echo $client->phone; ?></td>
                                    <td><?php echo $client->address; ?></td>
                                    <td>
                                        <a href="#" class="btn bg-orange"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn bg-maroon"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

              <?php } else { ?>
                <p>No clients found.</p>
              <?php } ?>
    
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


<!-- Add client modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('', array('id' => 'add-client-form', 'class' => 'needs-validation', 'novalidate' => '')); ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="invalid-feedback">
                            Please enter the client's name.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                        <div class="invalid-feedback">
                            Please enter the client's phone number.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                        <div class="invalid-feedback">
                            Please enter the client's address.
                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*" required>
                            <label class="custom-file-label" for="photo">Choose file...</label>
                            <div class="invalid-feedback">
                                Please choose a photo for the client.
                            </div>
                        </div>
                    </div>
              -->
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add-client-form">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    // Handle form submission with AJAX
    $("#add-client-form").submit(function(e) {
        e.preventDefault(); // Prevent default form submit behavior

        var formData = new FormData(this); // Create a new FormData object from the form data
        $.ajax({
            url: "<?php echo site_url('user/add_client'); ?>", // URL of the controller function that will handle the AJAX request
            type: "POST",
            data: formData,
            processData: false, // Don't process the data as form data
            contentType: false, // Don't set content type to default value
            success: function(response) {
                // Handle the response from the controller
                if (response.success) {
                    // Reload the clients table to display the new client
                    $('#clients-table').DataTable().ajax.reload();
                    // Close the modal
                    $('#add-client-modal').modal('hide');
                    // Reset the form fields
                    $('#add-client-form')[0].reset();
                    // Show a success message
                    toastr.success(response.message);
                } else {
                    // Show validation errors
                    $('#add-client-modal .modal-body').html(response);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});

</script>
