<!-- Main content -->

<section class="content">
    <!-- Debug output -->
<?php
    echo "Is Admin: " . ($is_admin ? 'Yes' : 'No') . "<br>";
    echo "User ID: " . $user_id . "<br>";
    echo "User['id']: " . $user['id'] . "<br>";
?>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
                <div class="pull-left">
                    <h3 class="box-title">User Information</h3>
                </div>
                <div class="pull-right">
                    <p>ID: <?php echo $user_id ?></p>
                </div>
            </div>
                <!-- /.box-header -->
                <!-- User Information Form -->
                <form role="form" id="updateUserForm" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $user_data['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user_data['username']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_data['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $user_data['phone_number']; ?>">
                        </div>
                        <!-- Add more user fields here -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>


            </div>
            <!-- /.box -->
        
            <!-- Avatar Update Form -->
            <form role="form" method="post" action="<?php echo site_url('user/update_avatar/' . $user_id); ?>" enctype="multipart/form-data">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Avatar</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="avatar">Select a new avatar or choose from saved avatars:</label>
                            <input type="file" id="avatar" name="avatar">
                        </div>
                        <div class="form-group">
                            <label for="saved_avatar">Choose from saved avatars:</label>
                            <select class="form-control" id="saved_avatar" name="saved_avatar">
                                <?php foreach ($saved_avatars as $avatar): ?>
                                    <option value="<?php echo $avatar; ?>"><?php echo $avatar; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <!-- JavaScript to display the selected saved avatar in real-time -->
                            <script>
                                $('#saved_avatar').change(function () {
                                    var selectedAvatar = $(this).val();
                                    var selectedAvatarPath = "<?php echo base_url('assets/admin_lte_assets/dist/img/'); ?>" + selectedAvatar;
                                    
                                    $('#selected_avatar_preview').attr('src', selectedAvatarPath).show();
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="selected_avatar">Selected Avatar:</label>
                            <img id="selected_avatar_preview" src="#" alt="Selected Avatar" style="max-width: 100px; max-height: 100px; display: none;">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update Avatar</button>
                    </div>
                </div>
            </form>

           


            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
                </div>
                <!-- /.box-header -->
                <!-- Change Password Form -->
                <form role="form" method="post" action="<?php echo site_url('user/change_password/' . $user_id); ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-warning">Change Password</button>
                    </div>
                </form>
            </div>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Admin</h3>
                </div>
                <!-- /.box-header -->

                <!-- Admin Role and Status Form -->
                <?php if ($is_admin && $user_id !== $user_data['id']): ?>
                    <form role="form" method="post" action="<?php echo site_url('user/update_admin_role_status/' . $user_id); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="is_admin">Admin Role</label>
                                <select class="form-control" id="is_admin" name="is_admin">
                                    <option value="1" <?php echo ($user_data['is_admin'] == 1) ? 'selected' : ''; ?>>Admin</option>
                                    <option value="0" <?php echo ($user_data['is_admin'] == 0) ? 'selected' : ''; ?>>Not Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="active">Status</label>
                                <select class="form-control" id="active" name="active">
                                    <option value="1" <?php echo ($user_data['active'] == 1) ? 'selected' : ''; ?>>Active</option>
                                    <option value="0" <?php echo ($user_data['active'] == 0) ? 'selected' : ''; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update Admin Role & Status</button>
                        </div>
                    </form>
                <?php endif; ?>


            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>

<script>

$(document).ready(function () {
        $('#updateUserForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?php echo site_url("user/update_user/{$user_id}") ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var data = JSON.parse(response);
                    handleBackendMessage(data.status, data.message);

                    if (data.status === 'success') {
                        // Handle success actions here, such as closing modals or reloading the page
                            // Reload the page after a delay (e.g., 2000 milliseconds or 2 seconds)
                        setTimeout(function() {
                            location.reload();
                        }, 2000); // Adjust the timeout duration as needed
                    }
                },
                error: function () {
                    // Handle AJAX error
                    handleBackendMessage('error', 'An error occurred while updating user information.');
                }
            });
        });
    });

    // Display selected avatar image in real-time
    $(document).ready(function () {
        $("#saved_avatar").change(function () {
            var selectedAvatar = $(this).val();
            var selectedAvatarPath = "<?php echo base_url('assets/admin_lte_assets/dist/img/'); ?>" + selectedAvatar;
            
            $("#selected_avatar_preview").attr("src", selectedAvatarPath).show();
        });
    });
</script>