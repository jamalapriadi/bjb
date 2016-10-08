<!DOCTYPE html>
<html ng-app="frontApp">
<head>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Jamal Apriadi" />
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" />
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png');?>" />

    <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.css');?>"/>
</head>

<body ng-controller="<?php echo $ctrl;?>">
    <nav class="navbar navbar-default navbar-top" role="navigation" style="margin-bottom:0">
      <div class="container">
        <div>
            <div class="navbar-breadcrumb">
                <div class="kunjungan-id"><?php echo $this->session->kunjungan['nama'];?>  </div>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('home');?>">
                            Dashboard
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            Home
                        </a>
                    </li>
        
                    <li class="dropdown ">
                        <a class="dropdown-toggle" id="cabang-drop-nav" role="button" data-toggle="dropdown" href="#">
                            KC    
                            <b class="caret"></b>
                        </a>
        
                        <ul id="cabang-dropdown" class="dropdown-menu">
                            <li ng-repeat="k in cabang" class="cabang-drop-nav-item " data-id-kanwil="{{k.id_cabang}}">
                                <a tabindex="-1" href="<?php echo site_url();?>home/cabang/{{k.id_cabang}}" class="">
                                    {{k.nama_cabang}}                                                 
                                </a>
                            </li>
                        </ul> 
                    </li>        
                </ol>
                <img src="<?php echo base_url('assets/images/logo.png');?>" class="navbar-logo">
            </div>  <!-- End of breadcrumb -->
            <div class="clearfix"></div>
        </div>