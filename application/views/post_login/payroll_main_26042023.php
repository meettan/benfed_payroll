<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Benfed Payrol CRM</title>
  <link rel="stylesheet" href="<?=base_url()?>assets/css/select2.min.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  <link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.png" />

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo topLogo" href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/benfed.png" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/logo-mini.svg" alt="logo"/></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav mr-lg-2">
              <li class="nav-item nav-search d-none d-lg-block">
                <!-- <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="search"> -->
                      <!-- <i class="mdi mdi-magnify"></i> -->
                    <!-- </span>
                  </div> -->
                  <!-- <input type="text" class="form-control" placeholder="Search..." aria-label="search" aria-describedby="search"> -->
                <!-- </div> -->
                <ul class="header_top">
    <li><strong>Branch Name: </strong>Head Office</li>
    <!-- <li><strong>Financial Year: </strong>2022-23</li> -->
    <li><strong>User: </strong><?=$this->session->userdata('loggedin')['user_name']?></li>
    <li><strong>Module:</strong> HRMS Management</li>
    <li class="date"><strong>Date: </strong> <?=date('d-m-Y',strtotime(date('Y-m-d')))?></li>
       
</ul>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <!-- <li class="nav-item dropdown mr-1">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-email mx-0"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="https://via.placeholder.com/36x36" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                      </h6>
                      <p class="font-weight-light small-text text-muted mb-0">
                        The meeting is cancelled
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="https://via.placeholder.com/36x36" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                      </h6>
                      <p class="font-weight-light small-text text-muted mb-0">
                        New product launch
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="https://via.placeholder.com/36x36" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                      </h6>
                      <p class="font-weight-light small-text text-muted mb-0">
                        Upcoming board meeting
                      </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown mr-4">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell mx-0"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-information mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Application Error</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        Just now
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-warning">
                        <i class="mdi mdi-settings mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Settings</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        Private message
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                        <i class="mdi mdi-account-box mx-0"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">New user registration</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        2 days ago
                      </p>
                    </div>
                  </a>
                </div>
              </li> -->
              <!-- <li class="nav-item nav-profile dropdown mr-0 mr-sm-2">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                 
                  <span class="nav-profile-name nav_profile_name_custom"><i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a href="#" class="dropdown-item">
                    <i class="mdi mdi-settings text-primary"></i>
                    Change Password
                  </a>
                
                  <a href="#" class="dropdown-item">
                    <i class="mdi mdi-logout text-primary"></i>
                    Create User
                  </a>
                 
                </div>
              </li> -->
              <li class="nav-item dropdown mr-4"><a class="nav-link logoutLastNav" href="<?php echo site_url("Payroll_Login/logout") ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>


            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>index.php/Payroll_Login/main">
                <i class="mdi mdi-home-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <?php if($this->session->userdata['loggedin']['user_type']=="A" ){?>  
            <li class="nav-item">
              <a href="#" class="nav-link">
                <!-- <i class="mdi mdi-file-document-box-outline menu-icon"></i> -->
                <span class="menu-title">Master</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"><a href="<?php echo base_url(); ?>index.php/dept">Department</a></li>
                  <li class="nav-item"><a href="<?php echo site_url("vls");?>">Set Parameters</a></li>
                  <li class="nav-item"><a href="<?php echo base_url(); ?>index.php/ptax">Professional Tax</a></li>
                  <li class="nav-item"><a href="<?php echo site_url("stfemp");?>">Employee</a></li>
                </ul>
              </div>
            </li>
            <?php } ?>
            <?php if( $this->session->userdata['loggedin']['user_type']== "A"){  ?> 
            <li class="nav-item">
              <a href="#" class="nav-link">
                <!-- <i class="mdi mdi-file-document-box-outline menu-icon"></i> -->
                <span class="menu-title">Salary</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"><a href="<?php echo site_url("slrydtl");?>">Earnings</a></li>
                  <li class="nav-item"><a href="<?php echo site_url("slryded");?>">Deductions</a></li>
                  <li class="nav-item"><a href="<?php echo site_url("genspl");?>">Generate Payslip</a></li>
                  <li class="nav-item"><a href="<?php echo site_url("payapprv");?>">Approve</a> </li>
                  
                </ul>
              </div>
            </li>
            <?php } ?>
           
            <li class="nav-item">
              <a href="#" class="nav-link">
                <!-- <i class="mdi mdi-file-document-box-outline menu-icon"></i> -->
                <span class="menu-title">Report</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                 
                  <?php if( $this->session->userdata['loggedin']['user_type']=="A"){ ?>
                    <li class="nav-item"><a href="<?php echo site_url('reports/payslipreport'); ?>">Payslip</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('reports/paystatementreport'); ?>">Salary Statement Month Wise</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('reports/salarycatgreport'); ?>">Category wise Salary List</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('reports/totaldeduction'); ?>">Total Deduction</a></li>
                  <?php } ?>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <!-- <i class="mdi mdi-file-document-box-outline menu-icon"></i> -->
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                <li class="nav-item"><a href="<?php echo site_url("changepassword") ?>">Change Password</a></li>
                <?php  if($this->session->userdata['loggedin']['user_type']="A"){ ?>
                    <li class="nav-item"> <a href="<?php echo site_url('admin/user'); ?>">Create User</a></li>
                    <?php  }  ?>
                </ul>
              </div>
            </li>
           
             <!-- <li class="nav-item">
              <a href="<?php //echo site_url("Payroll_Login/logout") ?>" class="nav-link">
     
                <span class="menu-title">Logout</span></a>
              </li> -->
          </ul>
        </div>
      </nav>
    </div>
    <div class="container-fluid page-body-wrapper">
    <!-- partial -->