<!-- Main content -->
<section class="content">
    <?php
  // print_r($person); // Debug code
  
    //print_r($services_plans);

  // echo "Person ID: " . $person['person_id']; 
   // echo "Exeprience ID: " . $experience_id; 
  // echo "Base URL: " . base_url();


  ?>

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">


                    <img class="profile-user-img img-responsive img-circle"
                    src="<?php echo ($person['profile_picture'] !== null) ?
                        $person['website_url'] . '/assets/img/' . $person['profile_picture'] :
                        base_url('assets/uploads/avatar.png'); ?>"
                        alt="Person profile picture">


                    <h3 class="profile-username text-center">
                        <?php echo $person['full_name']; ?>
                    </h3>

                    <p class="text-muted text-center">
                        <span class="label <?php echo ($person['status'] === 'Active') ? 'label-success' : 'label-danger'; ?>">
                            <?php echo $person['status']; ?>
                        </span>
                    </p>


                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item"></li>
                        <b>Full Name</b> <a class="pull-right">
                            <?php echo $person['full_name']; ?>
                        </a>

                        </li>
                        <li class="list-group-item"></li>
                        <b>Age</b> <a class="pull-right">
                            <?php echo $person['age']; ?>
                        </a>
                        </li>
                        <li class="list-group-item">
                            <b>Member since</b> <a class="pull-right">
                                <?php echo date_diff(date_create($person['timestamp']), date_create('now'))->format('%m months, %d days ago'); ?>
                            </a>
                        </li>
                    </ul>

                    <a href="<?php echo $person['website_url']; ?>" class="btn btn-primary btn-block"><b>Visit
                            Website</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>

                    <p class="text-muted"><?php echo $person['email']; ?></p>

                    <hr>

                    <strong><i class="fa fa-phone margin-r-5"></i>Phone Number</strong>

                    <p class="text-muted"><?php echo $person['phone_number']; ?></p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i>Location</strong>

                    <p class="text-muted">
                        <?php echo $person['address']; ?>
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Title</strong>

                    <p>
                        <?php echo $person['title']; ?>
                    </p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


            <!-- Social Media Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Social Media</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <!-- Facebook -->
                        <li class="list-group-item">
                            <a class="btn btn-social-icon btn-facebook btn-xs" href="https://www.facebook.com/<?= $person['facebook'] ?>" target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a class="pull-right" href="https://www.facebook.com/<?= $person['facebook'] ?>" target="_blank"><?= $person['facebook'] ?></a>
                        </li>
                        <!-- Twitter -->
                        <li class="list-group-item">
                            <a class="btn btn-social-icon btn-twitter btn-xs" href="https://twitter.com/<?= $person['twitter'] ?>" target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a class="pull-right" href="https://twitter.com/<?= $person['twitter'] ?>" target="_blank"><?= $person['twitter'] ?></a>
                        </li>
                        <!-- LinkedIn -->
                        <li class="list-group-item">
                            <a class="btn btn-social-icon btn-linkedin btn-xs" href="https://www.linkedin.com/in/<?= $person['linkedin'] ?>" target="_blank">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a class="pull-right" href="https://www.linkedin.com/in/<?= $person['linkedin'] ?>" target="_blank"><?= $person['linkedin'] ?></a>
                        </li>
                        <!-- GitHub -->
                        <li class="list-group-item">
                            <a class="btn btn-social-icon btn-github btn-xs" href="https://github.com/<?= $person['github'] ?>" target="_blank">
                                <i class="fa fa-github"></i>
                            </a>
                            <a class="pull-right" href="https://github.com/<?= $person['github'] ?>" target="_blank"><?= $person['github'] ?></a>
                        </li>
                        <!-- Instagram -->
                        <li class="list-group-item">
                            <a class="btn btn-social-icon btn-instagram btn-xs" href="https://www.instagram.com/<?= $person['instagram'] ?>" target="_blank">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a class="pull-right" href="https://www.instagram.com/<?= $person['instagram'] ?>" target="_blank"><?= $person['instagram'] ?></a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>



        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Overview</a></li>
                    <li><a href="#invoice" data-toggle="tab">Invoice</a></li>
                    <li><a href="#service" data-toggle="tab">Service</a></li>
                    <li><a href="#project" data-toggle="tab">Project</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane"  id="activity">
                        <!-- box Experiences -->
                        
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Experience Table</h3>
                                <div class="box-tools">
                                    <button type="button" class="btn bg-olive btn-flat" data-toggle="modal"
                                        data-target="#addExperienceModal">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th style="width:49%;">Description</th>
                                        <th>Start date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($experiences as $experience): ?>
                                    <tr>
                                        <td>
                                            <?= $experience['experience_id'] ?>
                                        </td>
                                        <td>
                                            <?= $experience['job_title'] ?>
                                        </td>
                                        <td>
                                            <?= $experience['company'] ?>
                                        </td>
                                        <td class="text-left">
                                            <ul>
                                                <?php $descriptionArray = json_decode($experience['description']); ?>
                                                <?php if (is_array($descriptionArray)): ?>
                                                    <?php foreach ($descriptionArray as $description): ?>
                                                        <li><?= $description ?></li>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <li><?= $experience['description'] ?></li>
                                                <?php endif; ?>
                                            </ul>
                                        </td>

                                        <td><span class="label label-success"><?= $experience['start_date'] ?></span></td>
                                        <td><span class="label label-danger"><?= $experience['end_date'] ?></span></td>
                                            <!-- Actions -->
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-primary edit-experience"
                                                    data-toggle="modal" data-target="#updateExperienceModal"
                                                    data-experience-id="<?= $experience['experience_id'] ?>"
                                                    data-job-title="<?= $experience['job_title'] ?>"
                                                    data-company="<?= $experience['company'] ?>"
                                                    data-start-date="<?= $experience['start_date'] ?>"
                                                    data-end-date="<?= $experience['end_date'] ?>"
                                                    data-description="<?= $experience['description'] ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-xs btn-danger delete-experience"
                                                    data-experience-id="<?= $experience['experience_id'] ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        
                        <!-- /.box Experiences -->

                        <!-- box Education -->
                        
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Education Table</h3>
                                <div class="box-tools">
                                    <button type="button" class="btn bg-olive btn-flat" data-toggle="modal" data-target="#addEducationModal">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Degree</th>
                                        <th>Institution</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($educations as $education): ?>
                                        <tr>
                                            <td>
                                                <?= $education['education_id'] ?>
                                            </td>
                                            <td>
                                                <?= $education['degree'] ?>
                                            </td>
                                            <td>
                                                <?= $education['institution'] ?>
                                            </td>
                                            <td>
                                                <?= $education['description'] ?>
                                            </td>
                                            <td><span class="label label-success"><?= $education['start_date'] ?></span></td>
                                            <td><span class="label label-danger"><?= $education['end_date'] ?></span></td>
                                            <!-- Actions -->
                                            <td>
                                                <div class="btn-group">
                                                <button class="btn btn-xs btn-primary edit-education" data-target="#editEducationModal"
                                                    data-education-id="<?= $education['education_id'] ?>"
                                                    data-degree="<?= $education['degree'] ?>"
                                                    data-institution="<?= $education['institution'] ?>"
                                                    data-start-date="<?= $education['start_date'] ?>"
                                                    data-end-date="<?= $education['end_date'] ?>"
                                                    data-description="<?= $education['description'] ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-xs btn-danger delete-education"
                                                    data-education-id="<?= $education['education_id'] ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>


                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        
                        <!-- /.box Education -->


                        <!-- box Skills -->
                        
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Skills Table</h3>
                                <div class="box-tools">
                                    <button type="button" class="btn bg-olive btn-flat" data-toggle="modal" data-target="#addSkillModal">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-condensed">
                                    <tr>
                                        <th>#</th>
                                        <th>Skill Name</th>
                                        <th>Proficiency Level</th>
                                        <th>Description</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    <?php foreach ($skills as $skill): ?>
                                        <tr>
                                            <td><?= $skill['skill_id'] ?></td>
                                            <td><?= $skill['skill_name'] ?></td>
                                            <td>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar <?= get_progress_bar_color($skill['proficiency_level']) ?>" style="width: <?= $skill['proficiency_level'] ?>%;"></div>
                                                </div>
                                            </td>
                                            <td><?= $skill['skill_description'] ?></td>
                                            <td>
                                                <!-- Actions -->
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-primary edit-skill" data-toggle="modal" data-target="#updateSkillModal"
                                                        data-skill-id="<?= $skill['skill_id'] ?>"
                                                        data-skill-name="<?= $skill['skill_name'] ?>"
                                                        data-proficiency-level="<?= $skill['proficiency_level'] ?>"
                                                        data-skill-description="<?= $skill['skill_description'] ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-xs btn-danger delete-skill"
                                                            data-id="<?= $skill['skill_id'] ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                       
                        <!-- /.box Skills -->

                    </div>

                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="invoice">

                        <div class="pad margin no-print">
                            <div class="callout callout-info" style="margin-bottom: 0!important;">
                                <h4><i class="fa fa-info"></i> Note:</h4>
                                This page has been enhanced for printing. Click the print button at the bottom of the
                                invoice to test.
                            </div>
                        </div>


                        <section class="invoice">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2 class="page-header">
                                        <i class="fa fa-globe"></i> AdminLTE, Inc.
                                        <small class="pull-right">Date: 2/10/2014</small>
                                    </h2>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>Admin, Inc.</strong><br>
                                        795 Folsom Ave, Suite 600<br>
                                        San Francisco, CA 94107<br>
                                        Phone: (804) 123-5432<br>
                                        Email: info@almasaeedstudio.com
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>John Doe</strong><br>
                                        795 Folsom Ave, Suite 600<br>
                                        San Francisco, CA 94107<br>
                                        Phone: (555) 539-1037<br>
                                        Email: john.doe@example.com
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice #007612</b><br>
                                    <br>
                                    <b>Order ID:</b> 4F3S8J<br>
                                    <b>Payment Due:</b> 2/22/2014<br>
                                    <b>Account:</b> 968-34567
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-xs-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Qty</th>
                                                <th>Product</th>
                                                <th>Serial #</th>
                                                <th>Description</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Call of Duty</td>
                                                <td>455-981-221</td>
                                                <td>El snort testosterone trophy driving gloves handsome</td>
                                                <td>$64.50</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Need for Speed IV</td>
                                                <td>247-925-726</td>
                                                <td>Wes Anderson umami biodiesel</td>
                                                <td>$50.00</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Monsters DVD</td>
                                                <td>735-845-642</td>
                                                <td>Terry Richardson helvetica tousled street art master</td>
                                                <td>$10.70</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Grown Ups Blue Ray</td>
                                                <td>422-568-642</td>
                                                <td>Tousled lomo letterpress</td>
                                                <td>$25.99</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-xs-6">
                                    <p class="lead">Payment Methods:</p>
                                    <img src="<?php echo base_url('assets/admin_lte_assets/dist/img/credit/visa.png'); ?>"
                                        alt="Visa">
                                    <img src="<?php echo base_url('assets/admin_lte_assets/dist/img/credit/mastercard.png'); ?>"
                                        alt="Mastercard">
                                    <img src="<?php echo base_url('assets/admin_lte_assets/dist/img/credit/american-express.png'); ?>"
                                        alt="American Express">
                                    <img src="<?php echo base_url('assets/admin_lte_assets/dist/img/credit/paypal2.png'); ?>"
                                        alt="Paypal">



                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning
                                        heekya handango imeem
                                        plugg
                                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-xs-6">
                                    <p class="lead">Amount Due 2/22/2014</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>$250.30</td>
                                            </tr>
                                            <tr>
                                                <th>Tax (9.3%)</th>
                                                <td>$10.34</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping:</th>
                                                <td>$5.80</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>$265.24</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-xs-12">
                                    <a href="" target="_blank" class="btn btn-default"><i class="fa fa-print"></i>
                                        Print</a>
                                    <button type="button" class="btn btn-success pull-right"><i
                                            class="fa fa-credit-card"></i> Submit
                                        Payment
                                    </button>
                                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                                        <i class="fa fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </section>
                        <!-- /.content -->
                    </div>
                    <!-- /.tab-pane -->

                    <!-- Service tab  -->
                    <div class="tab-pane" id="service">

                        <!-- Services Table -->
                        
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Services Table</h3>
                                <div class="box-tools">
                                    <button type="button" class="btn bg-olive btn-flat" data-toggle="modal" data-target="#addServiceModal">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Service Name</th>
                                        <th>Description</th>
                                        <th>Service Icon</th>
                                        <!-- Add more columns as needed -->
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($services as $service): ?>
                                    <tr>
                                        <td><?= $service['service_id'] ?></td>
                                        <td><?= $service['service_name'] ?></td>
                                        <td><?= $service['description'] ?></td>
                                        <td class="text-center"><i class="<?php echo $service['service_icon']; ?>"></i></td>
                                        <!-- Add more columns as needed -->
                                        <td>
                                            <!-- Actions -->
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-primary edit-service" data-toggle="modal"
                                                    data-target="#updateServiceModal" data-service-id="<?= $service['service_id'] ?>"
                                                    data-service-name="<?= $service['service_name'] ?>"
                                                    data-description="<?= $service['description'] ?>"
                                                    data-service-icon="<?= $service['service_icon'] ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-xs btn-danger delete-service"
                                                    data-service-id="<?= $service['service_id'] ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        
                        <!-- /.Services Table -->

                        <!-- ServicesPlan Table -->
                       
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Services Plan Table</h3>
                                <div class="box-tools">
                                    <button type="button" class="btn bg-olive btn-flat" data-toggle="modal" data-target="#addServicesPlanModal">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Plan Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Features</th>
                                        <!-- Add more columns as needed -->
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($services_plans as $plan): ?>
                                        <tr>
                                            <td><?= $plan['plan_id'] ?></td>
                                            <td>
                                                <?php
                                                    $badgeColor = $plan['badge_color'];
                                                    $planName = $plan['plan_name'];
                                                ?>
                                                <span class="label label-<?= $badgeColor ?>"><?= $planName ?></span>
                                                </td>
                                            <td><?= $plan['price'] ?></td>
                                            <td><?= $plan['description'] ?></td>
                                            <td>
                                                <ul>
                                                    <?php $features = json_decode($plan['features']); ?>
                                                    <?php foreach ($features as $feature): ?>
                                                        <li><?= $feature ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </td>
                                            <td>
                                                <!-- Actions -->
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-primary edit-services-plan" data-toggle="modal"
                                                        data-target="#updateServicesPlanModal" data-plan-id="<?= $plan['plan_id'] ?>"
                                                        data-plan-name="<?= $plan['plan_name'] ?>" data-price="<?= $plan['price'] ?>"
                                                        data-description="<?= $plan['description'] ?>" data-features="<?= $plan['features'] ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-xs btn-danger delete-service-plan"
                                                            data-id="<?= $plan['plan_id'] ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        
                        <!-- /.ServicesPlan Table -->

                        <!-- Testimonials Table -->
                       
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Testimonials Table</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Avatar</th>
                                        <th>Client</th>
                                        <th>Role</th>
                                        <th style="width: 305px;">Testimonial</th>
                                        <th>Client company</th>
                                        <th style="width: 100px;">Rate</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($testimonials as $testimonial): ?>
                                    <tr>
                                        <td><?= $testimonial['testimonial_id'] ?></td>
                                        <td>
                                            <?php
                                            $imagePath = !empty($testimonial['client_avatar']) ? $person['website_url'] . '/assets/img/' . $testimonial['client_avatar'] : 'https://via.placeholder.com/50x50';
                                            ?>
                                            <img class="img-responsive img-circle testimonial-avatar" 
                                                src="<?= $imagePath ?>" 
                                                alt="<?= $testimonial['client_name'] ?>" 
                                                style="max-width: 50px; max-height: 50px;">
                                        </td>
                                        <td><?= $testimonial['client_name'] ?></td>
                                        <td><?= $testimonial['client_role'] ?></td>
                                        <td><?= $testimonial['testimonial_text'] ?></td>
                                        <td><?= $testimonial['client_company'] ?></td>
                                        <td>
                                            <div class="rating">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <?php if ($i <= $testimonial['client_rate']): ?>
                                                        <i class="fa fa-star text-yellow"></i>
                                                    <?php else: ?>
                                                        <i class="fa fa-star-o text-yellow"></i>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <!-- Actions -->
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-primary edit-testimonial" data-toggle="modal"
                                                    data-target="#updateTestimonialModal" data-testimonial-id="<?= $testimonial['testimonial_id'] ?>"
                                                    data-testimonial-text="<?= $testimonial['testimonial_text'] ?>"
                                                    data-client-name="<?= $testimonial['client_name'] ?>"
                                                    data-client-company="<?= $testimonial['client_company'] ?>"
                                                    data-client-avatar="<?= $testimonial['client_avatar'] ?>"
                                                    data-client-role="<?= $testimonial['client_role'] ?>"
                                                    data-client-rate="<?= $testimonial['client_rate'] ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-xs btn-danger delete-testimonial"
                                                        data-id="<?= $testimonial['testimonial_id'] ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        
                        <!-- /.Testimonials Table -->



                    </div>
                    <!-- /.Service tab-->

                    <!-- Project tab  -->
                    <div class="tab-pane" id="project">

                        <div class="box-body">
                            <div class="box-group" id="accordion">
                                <?php foreach ($projects as $index => $project) : ?>
                                    <div class="panel box project-accordion-panel">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $index + 1 ?>" aria-expanded="false" class="collapsed">
                                                    Project #<?= $index + 1 ?> - <?= $project['title'] ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?= $index + 1 ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <p class="lead">Project Details:</p>
                                                        <?php if (!empty($project['image'])) : ?>
                                                            <img src="<?= $person['website_url'] . '/assets/img/portfolio/' . $project['image'] ?>" alt="Project Image" class="img-responsive" style="max-width: 100%;">
                                                        <?php endif; ?>
                                                        <p>Description:</p>
                                                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                            <?= $project['description'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <p class="lead">Project ID <?= $project['project_id'] ?></p>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th style="width:50%">Title:</th>
                                                                        <td><?= $project['title'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Project URL:</th>
                                                                        <td><a href="<?= $project['project_url'] ?>" target="_blank"><?= $project['project_url'] ?></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Skills Used:</th>
                                                                        <td>
                                                                            <p>
                                                                                <?php foreach (explode(',', $project['skills_used']) as $skill) : ?>
                                                                                    <span class="label label-success"><?= trim($skill) ?></span>
                                                                                <?php endforeach; ?>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Category:</th>
                                                                        <td><?= $project['category'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <?php if (!empty($project['imageModal'])) : ?>
                                                                            <img src="<?= $person['website_url'] . '/assets/img/portfolio/modals/' . $project['imageModal'] ?>" alt="Project Image modal" class="img-responsive" style="max-width: 100%;">
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row no-print">
                                                    <div class="col-xs-12">
                                                        <a href="" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                                        <button type="button" class="btn btn-success edit-project" data-project-id="<?= $project['project_id'] ?>" data-toggle="modal" data-target="#updateProjectModal">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </button>


                                                        <!-- Delete button with data attribute for project ID -->
                                                        <button type="button" style="margin: 0 20px;" class="btn btn-danger pull-right btn-delete-project"
                                                            data-project-id="<?= $project['project_id'] ?>"
                                                        >
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                    <!-- /.Project tab-->

                    <div class="tab-pane" id="settings">
                        <!-- Main content -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Update Person Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form id="updatePersonForm" role="form" action="<?= base_url('person/update_person/' . $person['person_id']) ?>" method="post" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter full name" value="<?= $person['full_name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= $person['email'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number" value="<?= $person['phone_number'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?= $person['address'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="profile_picture">Profile Picture</label>
                                        <input type="file" id="profile_picture" name="profile_picture">
                                        <p class="help-block">Upload a new profile picture (optional).
                                            <small class="form-text text-muted">(allowed types: jpg, jpeg, png, gif). Max file size: 1MB.</small>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">Bio</label>
                                        <textarea class="form-control" id="bio" name="bio" rows="4" placeholder="Enter bio"><?= $person['bio'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" value="<?= $person['age'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?= $person['title'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter Twitter URL" value="<?= $person['twitter'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter Facebook URL" value="<?= $person['facebook'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="linkedin">LinkedIn</label>
                                        <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter LinkedIn URL" value="<?= $person['linkedin'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="github">GitHub</label>
                                        <input type="text" class="form-control" id="github" name="github" placeholder="Enter GitHub URL" value="<?= $person['github'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter Instagram URL" value="<?= $person['instagram'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="website_url">Website URL</label>
                                        <input type="text" class="form-control" id="website_url" name="website_url" placeholder="Enter website URL" value="<?= $person['website_url'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" value="Active" <?= ($person['status'] == 'Active') ? 'checked' : '' ?>>
                                                Active
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" value="Inactive" <?= ($person['status'] == 'Inactive') ? 'checked' : '' ?>>
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>

                        <!-- /.content -->
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Load the modals from person_modals.php -->
<?php 
$this->load->view('admin/persons/person_modals', array('projects' => $projects));
?>

<!-- Modals and script -->


<script>


    $(document).ready(function() {
        var service_id; // Define the service_id variable in the outer scope


        // Handle form submission for adding experience
        $('#addExperienceForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?php echo base_url('person/add_experience/') . $person['person_id']; ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    var data = JSON.parse(response);
                    handleBackendMessage(data.status, data.message);

                    if (data.status === 'success') {
                        // Close the modal on success after a delay
                        setTimeout(function() {
                            $('#addExperienceModal').modal('hide');
                        }, 1500); // Adjust the timeout duration as needed

                        // Reload the page to show the updated experience data after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 1500); // Adjust the timeout duration as needed
                    }
                },
                error: function() {
                    // Handle AJAX error
                    handleBackendMessage('error', 'An error occurred while adding experience.');
                }
            });
        });

        // Event handler for the "Edit" button
        $('.edit-experience').click(function() {
            // Extract data attributes from the button
            var jobTitle = $(this).data('job-title');
            var company = $(this).data('company');
            var startDate = $(this).data('start-date');
            var endDate = $(this).data('end-date');
            var description = $(this).data('description');
            var experience_id = $(this).data('experience-id'); // Assign the value to the outer scope variable

            // Populate modal fields with data
            $('#editJobTitle').val(jobTitle);
            $('#editCompany').val(company);
            $('#editStartDate').val(startDate);
            $('#editEndDate').val(endDate);
            $('#editDescription').val(description);
            $('#editExperienceId').val(experience_id); // Corrected variable name here

            // Show the modal
            $('#editExperienceModal').modal('show');
        });

        // Handle form submission for updating experience
        $('#editExperienceForm').submit(function(e) {
            e.preventDefault();

            // Define formData with the form data you want to send
            var formData = $(this).serializeArray();

            $.ajax({
                url: '<?php echo base_url("person/update_experience/{$person_id}/") ?>' + experience_id,
                type: 'POST',
                data: formData,
                success: function(response) {
                    var data = JSON.parse(response);
                    handleBackendMessage(data.status, data.message);

                    if (data.status === 'success') {
                        // Close the modal on success after a delay
                        setTimeout(function() {
                            $('#editExperienceModal').modal('hide');
                        }, 1500); // Adjust the timeout duration as needed

                        // Reload the page to show the updated experience data after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 1500); // Adjust the timeout duration as needed
                    }
                },
                error: function() {
                    // Handle AJAX error
                    handleBackendMessage('error', 'An error occurred while updating experience.');
                }
            });
        });

        // Handle form submission for adding education
        $('#addEducationForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?php echo base_url("person_manager/add_education/") . $person_id; ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    var data = JSON.parse(response);
                    handleBackendMessage(data.status, data.message);

                    if (data.status === 'success') {
                        // Close the modal on success after a delay
                        setTimeout(function() {
                            $('#addEducationModal').modal('hide');
                        }, 1500); // Adjust the timeout duration as needed

                        // Reload the page to show the updated education data after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 1500); // Adjust the timeout duration as needed
                    }
                },
                error: function() {
                    // Handle AJAX error
                    handleBackendMessage('error', 'An error occurred while adding education.');
                }
            });
        });

        // Event handler for the "Edit" button for education
        $('.edit-education').click(function() {
            // Extract data attributes from the button
            var degree = $(this).data('degree');
            var institution = $(this).data('institution');
            var startDate = $(this).data('start-date');
            var endDate = $(this).data('end-date');
            var description = $(this).data('description');
            var education_id = $(this).data('education-id'); 

            // Populate modal fields with data
            $('#editDegree').val(degree);
            $('#editInstitution').val(institution);
            $('#editStartDate').val(startDate);
            $('#editEndDate').val(endDate);
            $('#editDescription').val(description);
            $('#editEducationId').val(education_id);


            // Show the modal for editing education
            $('#editEducationModal').modal('show');
        });

        // Handle form submission for updating education
        $('#editEducationForm').submit(function(e) {
            e.preventDefault();

            // Define formData with the form data you want to send
            var formData = $(this).serializeArray();

            $.ajax({
                url: '<?php echo base_url("person_manager/update_education/{$person_id}/") ?>' + education_id,
                type: 'POST',
                data: formData,
                success: function(response) {
                    var data = JSON.parse(response);
                    handleBackendMessage(data.status, data.message);

                    if (data.status === 'success') {
                        // Close the modal on success after a delay
                        setTimeout(function() {
                            $('#editEducationModal').modal('hide');
                        }, 1500); // Adjust the timeout duration as needed

                        // Reload the page to show the updated education data after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 1500); // Adjust the timeout duration as needed
                    }
                },
                error: function() {
                    // Handle AJAX error
                    handleBackendMessage('error', 'An error occurred while updating education.');
                }
            });
        });


        // Handle form submission for adding Service
        // Implement JavaScript to show the icon preview.
        $('#serviceIconName').on('input', function() {
            var iconName = $(this).val();
            var iconPreview = $('#iconPreview');

            // Clear the icon preview
            iconPreview.empty();

            // Check if the iconName is not empty
            if (iconName.trim() !== '') {
                // Create the icon element
                var icon = $('<i>');

                // Add classes for the icon library (FontAwesome or Ionicons)
                icon.addClass('fa'); // For FontAwesome
                // icon.addClass('ion'); // For Ionicons

                // Add the icon name (FontAwesome or Ionicons class)
                icon.addClass('fa-' + iconName); // For FontAwesome
                // icon.addClass('ion-' + iconName); // For Ionicons

                // Append the icon to the preview area
                iconPreview.append(icon);
            }
        });

        // Handle form submission for adding service
        $('#addServiceForm').submit(function(e) {
            e.preventDefault();

            // Get the user input from the 'serviceIconName' input field
            const userInput = $('#serviceIconName').val();

            // Transform the user input into the desired format
            const transformedInput = `ion-ios-${userInput}`;

            // Update the 'serviceIconName' input field with the transformed value
            $('#serviceIconName').val(transformedInput);

            $.ajax({
                url: '<?php echo base_url('person_manager/add_service/') . $person['person_id']; ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    var data = JSON.parse(response);
                    handleBackendMessage(data.status, data.message);

                    if (data.status === 'success') {
                        // Close the modal on success after a delay
                        setTimeout(function() {
                            $('#addServiceModal').modal('hide');
                        }, 1500); // Adjust the timeout duration as needed

                        // Reload the page to show the updated service data after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 1500); // Adjust the timeout duration as needed
                    }
                },
                error: function() {
                    // Handle AJAX error
                    handleBackendMessage('error', 'An error occurred while adding service.');
                }
            });
        });

        // Event handler for the "Edit" button
        $('.edit-service').click(function() {
            // Extract data attributes from the button
            var serviceName = $(this).data('service-name');
            var serviceDescription = $(this).data('description');
            var serviceIcon = $(this).data('service-icon');
            var serviceId = $(this).data('service-id'); // Assign the value to the outer scope variable

            // Populate modal fields with data
            $('#editServiceName').val(serviceName);
            $('#editServiceDescription').val(serviceDescription);
            $('#editServiceIcon').val(serviceIcon);
            $('#editServiceId').val(serviceId);

            // Show the modal
            $('#editServiceModal').modal('show');
        });

        // Handle form submission for updating service
        $('#editServiceForm').submit(function(e) {
            e.preventDefault();

            // Define formData with the form data you want to send
            var formData = $(this).serializeArray();

            $.ajax({
                url: '<?php echo base_url("person_manager/update_service/{$person_id}/") ?>' + $('#editServiceId').val(), // Use the hidden input value
                type: 'POST',
                data: formData,
                success: function(response) {
                    var data = JSON.parse(response);
                    handleBackendMessage(data.status, data.message);

                    if (data.status === 'success') {
                        // Close the modal on success after a delay
                        setTimeout(function() {
                            $('#editServiceModal').modal('hide');
                        }, 1500); // Adjust the timeout duration as needed

                        // Reload the page to show the updated service data after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 1500); // Adjust the timeout duration as needed
                    }
                },
                error: function() {
                    // Handle AJAX error
                    handleBackendMessage('error', 'An error occurred while updating service.');
                }
            });
        });


        // Event handler for the "Edit" button for projects
        $('.edit-project').click(function() {
            var projectId = $(this).data('project-id');

            // Make an AJAX request to get project data by ID
            $.ajax({
                url: '<?php echo base_url("person_project/get_project_by_id/"); ?>' + projectId,
                type: 'GET',
                dataType: 'json', // Expect JSON data
                success: function(data) {
                    console.log('Project data retrieved:', data);
                    
                    // Populate modal fields with retrieved data
                    $('#updateProjectId').val(data.project_id);
                    $('#updateTitle').val(data.title);
                    $('#updateDescription').val(data.description);
                    $('#updateSkillsUsed').val(data.skills_used);
                    $('#updateCategory').val(data.category);
                    $('#updateProjectUrl').val(data.project_url);
                    
                    // Show the modal for editing projects
                    $('#updateProjectModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log('AJAX error:', status, error);
                }
            });
        });

        // Handle form submission for updating projects
        $('#updateProjectForm').submit(function(e) {
            e.preventDefault();

            // Define formData with the form data you want to send
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: '<?php echo base_url("person_project/update_project/{$person_id}/"); ?>' + $('#updateProjectId').val(),
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
                            $('#updateProjectModal').modal('hide');
                        }, 1500); // Adjust the timeout duration as needed

                        // Reload the page to show the updated service data after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 1500); // Adjust the timeout duration as needed
                    }
                },
                error: function() {
                    // Handle AJAX error
                    handleBackendMessage('error', 'An error occurred while updating service.');
                }
            });
        });





    });

    // Function to set the proficiency value based on the selected level
    function setProficiencyValue(level, proficiencyValueInput) 
    {
        const minValue = 0;
        const maxValue = 100;

        if (level === 'Beginner') {
            proficiencyValueInput.value = Math.floor(Math.random() * 36); // Random value between 0 and 35
        } else if (level === 'Intermediate') {
            proficiencyValueInput.value = Math.floor(Math.random() * 31) + 35; // Random value between 35 and 65
        } else if (level === 'Advanced') {
            proficiencyValueInput.value = Math.floor(Math.random() * 26) + 65; // Random value between 65 and 90
        } else if (level === 'Master') {
            proficiencyValueInput.value = Math.floor(Math.random() * 11) + 90; // Random value between 90 and 100
        } else {
            proficiencyValueInput.value = ''; // Clear the input field if the level is not recognized
        }
    }

    $(document).ready(function() {
        // Add Skill Modal: Handle change event of proficiency level dropdown
        $('#addProficiencyLevel').change(function() {
            const selectedLevel = $(this).val();
            const proficiencyValueInput = document.getElementById('proficiency_value');
            setProficiencyValue(selectedLevel, proficiencyValueInput);
        });

        // Handle form submission for adding a skill
        $('#addSkillForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?php echo base_url("person_manager/add_skill/") . $person_id; ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    var data = JSON.parse(response);
                    handleBackendMessage(data.status, data.message);

                    if (data.status === 'success') {
                        // Close the modal on success after a delay
                        setTimeout(function() {
                            $('#addSkillModal').modal('hide');
                        }, 1500); // Adjust the timeout duration as needed

                        // Reload the page to show the updated skill data after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 1500); // Adjust the timeout duration as needed
                    }
                },
                error: function() {
                    // Handle AJAX error
                    handleBackendMessage('error', 'An error occurred while adding the skill.');
                }
            });
        });

        // Event handler for the "Edit" button for skills
        $('.edit-skill').click(function() {
            // Extract data attributes from the button
            var skill_name = $(this).data('skill-name');
            var skill_description = $(this).data('skill-description');
            skill_id = $(this).data('skill-id'); 

            // Populate modal fields with data
            $('#editSkillName').val(skill_name);
            $('#editSkillDescription').val(skill_description);
            $('#editSkillId').val(skill_id);

            // Show the modal for editing the skill
            $('#editSkillModal').modal('show');
        });

        // Handle form submission for updating a skill
        $('#editSkillForm').submit(function(e) {
            e.preventDefault();

            // Define formData with the form data you want to send
            var formData = $(this).serializeArray();

            $.ajax({
                url: '<?php echo base_url("person_manager/update_skill/{$person_id}/") ?>' + skill_id,
                type: 'POST',
                data: formData,
                success: function(response) {
                    var data = JSON.parse(response);
                    handleBackendMessage(data.status, data.message);

                    if (data.status === 'success') {
                        // Close the modal on success after a delay
                        setTimeout(function() {
                            $('#editSkillModal').modal('hide');
                        }, 1500); // Adjust the timeout duration as needed

                        // Reload the page to show the updated skill data after a delay
                        setTimeout(function() {
                            location.reload();
                        }, 1500); // Adjust the timeout duration as needed
                    }
                },
                error: function() {
                    // Handle AJAX error
                    handleBackendMessage('error', 'An error occurred while updating the skill.');
                }
            });
        });

    });
</script>


<script>
    //Define a single confirmDelete function
    function confirmDelete(itemType, itemId, successMessage, deleteUrl) {
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
                // User confirmed, send AJAX request to delete the item
                $.ajax({
                    url: deleteUrl + itemId,
                    type: 'POST',
                    success: function(response) {
                        var data = JSON.parse(response);
                        handleBackendMessage(data.status, data.message);

                        if (data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: successMessage,
                                text: 'The item has been deleted successfully!',
                                showConfirmButton: false, // Remove the "OK" button
                                timer: 2000, // Display the message for 2 seconds
                                timerProgressBar: true
                            }).then(() => {
                                // Reload the page after displaying the success message
                                location.reload();
                            });
                        }
                    },
                    error: function() {
                        // Handle AJAX error
                        handleBackendMessage('error', 'An error occurred while deleting the item.');
                    }
                });
            }
        });
    }

    // deleting services:
    $('.delete-service').click(function() {
        var serviceId = $(this).data('service-id');
        confirmDelete('service', serviceId, 'Service Deleted', '<?php echo base_url("person_manager/delete_service/"); ?>');
    });

    // deleting educations:
    $('.delete-education').click(function() {
        var educationId = $(this).data('education-id');
        confirmDelete('education', educationId, 'Education Deleted', '<?php echo base_url("person_manager/delete_education/"); ?>');
    });

    // deleting skills:
    $('.delete-skill').click(function() {
        var skillId = $(this).data('skill-id');
        confirmDelete('skill', skillId, 'Skill Deleted', '<?php echo base_url("person_manager/delete_skill/"); ?>');
    });

    // deleting experiences:
    $('.delete-experience').click(function() {
        var experienceId = $(this).data('experience-id');
        confirmDelete('experience', experienceId, 'Experience Deleted', '<?php echo base_url("person_manager/delete_experience/"); ?>');
    });

    // deleting services plans
    $('.delete-service-plan').click(function() {
        var planId = $(this).data('id');
        confirmDelete('service plan', planId, 'Service Plan Deleted', '<?php echo base_url("person_manager/delete_service_plan/"); ?>');
    });

    // deleting testimonials
    $('.delete-testimonial').click(function() {
        var testimonialId = $(this).data('id');
        confirmDelete('testimonial', testimonialId, 'Testimonial Deleted', '<?php echo base_url("person_manager/delete_testimonial/"); ?>');
    });

    // deleting skills
    $('.delete-skill').click(function() {
        var skillId = $(this).data('id');
        confirmDelete('skill', skillId, 'Skill Deleted', '<?php echo base_url("person_manager/delete_skill/"); ?>');
    });


    // deleting projects
    $('.btn-delete-project').click(function() {
        var projectId = $(this).data('project-id');
        confirmDelete('project', projectId, 'Project Deleted', '<?php echo base_url("person_project/delete_project/"); ?>');
    });


</script> 

<!-- Start of the footer -->