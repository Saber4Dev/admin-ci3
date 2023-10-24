<?php
//Debug code 
//var_dump($persons); ?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Persons</h3>
                    <div class="box-tools">
                        <button type="button" class="btn bg-olive btn-flat" data-toggle="modal" data-target="#addPersonModal">
                        <i class="fa fa-plus"></i> Add
                        </button>

                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <!-- person table -->
                    <table id="personTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Profile Pic</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Website</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($persons as $person): ?>
                                <tr>
                                    <td>
                                        <?php echo $person['person_id']; ?>
                                    </td>
                                    <td>
                                        <img src="<?php echo ($person['profile_picture'] !== null) ?
                                        $person['website_url'] . '/assets/img/' . $person['profile_picture'] :
                                        base_url('assets/uploads/avatar.png'); ?>"
                                        alt="Person profile picture" width="50" height="50">

                                            
                                    </td>
                                    <td>
                                    <i class="fa fa-user"></i> 
                                        <a href="<?php echo site_url('person/profile/' . $person['person_id']); ?>">
                                            <?php echo $person['full_name']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $person['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $person['phone_number']; ?>
                                    </td>
                                    <td>
                                        <i class="fa fa-globe"></i> <a class="text-green" href="<?php echo $person['website_url']; ?>" target="_blank"><?php echo $person['website_url']; ?></a>
                                    </td>
                                    <td>
                                        <span class="label <?php echo ($person['status'] === 'Active') ? 'label-success' : 'label-danger'; ?>">
                                            <?php echo ($person['status'] === 'Active') ? 'Active' : 'Inactive'; ?>
                                        </span>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-xs btn-primary" id="editPersonBtn<?php echo $person['person_id']; ?>">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                        <button type="button" class="btn btn-xs btn-danger" onclick="confirmDelete(<?php echo $person['person_id']; ?>)">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- END person table -->
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


<!-- Add Person Modal -->
<div class="modal fade" id="addPersonModal" tabindex="-1" role="dialog" aria-labelledby="addPersonModalLabel" aria-hidden="true">    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPersonModalLabel">Add New Person</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addPersonForm">
                <div class="modal-body">
                    <!-- Full Name -->
                    <div class="form-group">
                        <label for="addFullName">Full Name</label>
                        <input type="text" class="form-control" id="addFullName" name="full_name" placeholder="Full Name" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="addEmail">Email</label>
                        <input type="email" class="form-control" id="addEmail" name="email" placeholder="Email" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <label for="addPhoneNumber">Phone Number</label>
                        <input type="tel" class="form-control" id="addPhoneNumber" name="phone_number" placeholder="Phone Number" required>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="addAddress">Address</label>
                        <input type="text" class="form-control" id="addAddress" name="address" placeholder="Address" required>
                    </div>

                    <!-- Profile Picture -->
                    <div class="form-group">
                        <label for="addProfilePicture">Profile Picture (optional)</label>
                        <input type="file" class="form-control-file" id="addProfilePicture" name="profile_picture">
                        <small class="form-text text-muted">Max file size: 1MB. If not provided, a default image will be used.</small>
                    </div>

                    <!-- Bio -->
                    <div class="form-group">
                        <label for="addBio">Bio</label>
                        <textarea class="form-control" id="addBio" name="bio" placeholder="Bio"></textarea>
                    </div>

                    <!-- Age -->
                    <div class="form-group">
                        <label for="addAge">Age</label>
                        <input type="number" class="form-control" id="addAge" name="age" placeholder="Age">
                    </div>

                    <!-- Title -->
                    <div class="form-group">
                        <label for="addTitle">Title</label>
                        <input type="text" class="form-control" id="addTitle" name="title" placeholder="Title">
                    </div>

                    <!-- Website URL -->
                    <div class="form-group">
                        <label for="addWebsiteURL">Website URL</label>
                        <input type="url" class="form-control" id="addWebsiteURL" name="website_url" placeholder="Website URL">
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label>Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="addActive" value="Active" checked>
                            <label class="form-check-label" for="addActive">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="addInactive" value="Inactive">
                            <label class="form-check-label" for="addInactive">Inactive</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Person</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

// Handle form submission for adding a new person
$('#addPersonForm').submit(function(e) {
    e.preventDefault();

    // Define formData with the form data you want to send
    var formData = new FormData($(this)[0]);

    $.ajax({
        url: '<?php echo base_url("person/add_person/"); ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            var data = JSON.parse(response);
            handleBackendMessage(data.status, data.message);

            if (data.status === 'success') {
                // Close the modal on success after a delay
                setTimeout(function() {
                    $('#addPersonModal').modal('hide');
                }, 1500); // Adjust the timeout duration as needed

                // Reload the page to show the updated person data after a delay
                setTimeout(function() {
                    location.reload();
                }, 1500); // Adjust the timeout duration as needed
            }
        },
        error: function() {
            // Handle AJAX error
            handleBackendMessage('error', 'An error occurred while adding a person.');
        }
    });
});


// Define the confirmDelete function
function confirmDelete(person_id) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // User confirmed, send AJAX request to delete the person
            $.ajax({
                url: '<?php echo base_url("person/delete_person/") ?>' + person_id,
                type: 'POST',
                data: { person_id: person_id }, // Send the person_id to delete
                success: function(response) {
                    var data = JSON.parse(response);
                    handleBackendMessage(data.status, data.message);

                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Person deleted successfully',
                            text: 'The person has been deleted successfully!',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                        }).then(() => {
                            // Reload the page after displaying the success message
                            location.reload();
                        });
                    }
                },
                error: function() {
                    // Handle AJAX error
                    handleBackendMessage('error', 'An error occurred while deleting the person.');
                }
            });
        }
    });
}

$(document).ready(function() {
    // Handle click event to open SweetAlert for editing
    $('#editPersonBtn<?php echo $person['person_id']; ?>').click(function() {
        const personId = <?php echo $person['person_id']; ?>;
        const currentStatus = '<?php echo $person['status']; ?>';

        Swal.fire({
            title: 'Edit Person',
            html:
            '<div class="form-group">' +
                '<label for="swal-input1">Full Name</label>' +
                '<input type="text" id="swal-input1" class="form-control" value="<?php echo $person['full_name']; ?>" placeholder="Full Name">' +
            '</div>' +
            '<div class="form-group">' +
                '<label for="swal-input2">Email</label>' +
                '<input type="email" id="swal-input2" class="form-control" value="<?php echo $person['email']; ?>" placeholder="Email">' +
            '</div>' +
            '<div class="form-group">' +
                '<label for="swal-input3">Phone Number</label>' +
                '<input type="tel" id="swal-input3" class="form-control" value="<?php echo $person['phone_number']; ?>" placeholder="Phone Number">' +
            '</div>' +
            '<div class="form-group">' +
                '<label>Status</label>' +
                '<div class="form-check">' +
                    '<input class="form-check-input" type="radio" name="swal-input4" id="activeRadio" value="Active" ' + (currentStatus === 'Active' ? 'checked' : '') + '>' +
                    '<label class="form-check-label" for="activeRadio">Active</label>' +
                '</div>' +
                '<div class="form-check">' +
                    '<input class="form-check-input" type="radio" name="swal-input4" id="inactiveRadio" value="Inactive" ' + (currentStatus === 'Inactive' ? 'checked' : '') + '>' +
                    '<label class="form-check-label" for="inactiveRadio">Inactive</label>' +
                '</div>' +
            '</div>',
            focusConfirm: false,
            showCancelButton: true,
            preConfirm: () => {
                const fullName = document.getElementById('swal-input1').value;
                const email = document.getElementById('swal-input2').value;
                const phoneNumber = document.getElementById('swal-input3').value;
                const status = $('input[name="swal-input4"]:checked').val();

                // Send an AJAX request to update the person's information
                return $.ajax({
                    url: '<?php echo base_url("person/modify_person/"); ?>' + personId,
                    type: 'POST',
                    data: {
                        full_name: fullName,
                        email: email,
                        phone_number: phoneNumber,
                        status: status
                    }
                });
            }
        }).then((result) => {
            console.log(result.value); // Log the response for debugging
            
            if (result.value) {
                var data = JSON.parse(result.value);
                handleBackendMessage(data.status, data.message);

                if (data.status === 'success') {
                    // Close the SweetAlert on success after a delay
                    setTimeout(function() {
                        Swal.close();
                    }, 1500); // Adjust the timeout duration as needed

                    // Reload the page to show the updated information after a delay
                    setTimeout(function() {
                        location.reload();
                    }, 1500); // Adjust the timeout duration as needed
                }
            }
        });
    });
});

</script>