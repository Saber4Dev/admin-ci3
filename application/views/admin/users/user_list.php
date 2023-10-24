<?php
    //Debug code 
    //var_dump($users); 
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                    <div class="box-tools">
                        <button type="button" class="btn bg-olive btn-flat" data-toggle="modal" data-target="#addUserModal"><i class="fa fa-plus"></i> Add</button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- User table -->
                    <table id="userTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td>
                                            <?php echo $user['id']; ?>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url('assets/admin_lte_assets/dist/img/' . $user['avatar']); ?>" width="50" height="50" alt="User Avatar">
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('user/profile/' . $user['id']); ?>">
                                                <?php echo $user['name']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo $user['username']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['phone_number']; ?>
                                        </td>
                                        <td>
                                            <?php if ($user['is_admin']): ?>
                                                Admin
                                            <?php else: ?>
                                                Not Admin
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($user['active']): ?>
                                                <span class="label label-success">Active</span>
                                            <?php else: ?>
                                                <span class="label label-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('user/profile/' . $user['id']); ?>">
                                                <i class="fa fa-user"></i> View Profile
                                            </a>
                                            <a href="<?php echo site_url('user/edit/' . $user['id']); ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href="<?php echo site_url('user/delete/' . $user['id']); ?>" onclick="return confirm('Are you sure you want to delete this user?')">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">No users found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!-- END User table -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<!-- /.content -->
</div>

<!-- Add User modal -->
