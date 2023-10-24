<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/admin_lte_assets/dist/img/' . $user['avatar']); ?>" class="img-circle"
          alt="User Image">
      </div>
      <div class="pull-left info">
        <p>
          <?php echo $user['name']; ?>
        </p>
        <?php if ($is_admin): ?>
            <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
        <?php else: ?>
            <a href="#"><i class="fa fa-circle text-danger"></i> User</a>
        <?php endif; ?>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="<?php echo base_url('admin/dashboard'); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      <li>

      <!-- Conditional menu items for Users -->
      <?php if ($is_admin): ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users"></i> <span>Users</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('admin/users/user_list'); ?>"><i class="fa fa-circle-o"></i> User List</a></li>
              <li><a href="<?php echo base_url('admin/users/user_activity'); ?>"><i class="fa fa-circle-o"></i> User Activity</a></li>
                <!-- Add more user-related menu items if needed -->
            </ul>
        </li>
      <?php endif; ?>



      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Persons data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/persons/person_list'); ?>"><i class="fa fa-circle-o"></i> Persons</a></li>
          <li><a href="<?php echo base_url('admin/persons/company'); ?>"><i class="fa fa-circle-o"></i> Comapny</a></li>
          <li><a href="<?php echo base_url('admin/persons/services'); ?>"><i class="fa fa-circle-o"></i> Company
              Services</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Examples</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
          <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
          <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
          <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
          <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
          <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
          <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
          <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
          <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
        </ul>
      </li>

      <li><a href="<?php echo base_url(); ?>documentation/AdminLTE-2.3.11/documentation/index.html"><i
            class="fa fa-book"></i> <span>Documentation</span></a></li>
      <li><a href="<?php echo base_url(); ?>documentation/AdminLTE-2.3.11/index.html"><i class="fa fa-laptop"></i>
          <span>Demo</span></a></li>
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo ucwords(str_replace('_', ' ', $this->uri->segment(2))); ?>
      <small>
        <?php echo ucwords(str_replace('_', ' ', $this->uri->segment(3))); ?>
      </small>
    </h1>
    <ol class="breadcrumb">
      <?php echo generate_breadcrumb(); ?>
      <li class="active">
        <?php echo ucwords(str_replace('_', ' ', $this->uri->segment(4))); ?>
      </li>
    </ol>
  </section>