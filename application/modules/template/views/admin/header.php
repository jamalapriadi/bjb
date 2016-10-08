<!DOCTYPE html>
<html lang="en" ng-app="bjbApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png');?>" />
    <title>BJB | RAD Research</title>

    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- font Awesome -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?> " rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="<?php echo base_url('assets/css/AdminLTE-2.css');?>" rel="stylesheet" type="text/css" />

    <!-- selectize -->
    <link rel="stylesheet" href="<?php echo base_url('assets/select2/select2.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/select2/select2.bootstrap.min.css');?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- data tables -->
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/sweetalert/dist/sweetalert.css');?>" rel="stylesheet">

    <!-- daterange-->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.css');?>"/>
    
    

    <style>
        .modal.large .modal-dialog {
          width: 90%;
        }
        .large .modal-body {
          overflow-y: auto;
        }

    </style>
    </head>
<body class="skin-blue" ng-controller="<?php echo $ctrl;?>">

    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="<?php echo site_url('home');?>" class="logo" style="font-family : ">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            Admin Dashboard
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo site_url('home');?>">
                            <strong><?php echo $this->session->kunjungan['nama'];?></strong>
                        </a>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>bjbsyariah <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url('assets/images/avatar.png');?>" class="img-circle" alt="User Image" />
                                <p>
                                    bjbsyariah                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo site_url('home');?>" class="btn btn-default btn-flat">Homepage</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo site_url('admin/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
