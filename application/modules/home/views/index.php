<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content="Jamal Selaatan"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" />
</head>

<body>

    <nav class="navbar navbar-default navbar-top" role="navigation">
        <div style="height:70px;">

        </div>
        <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right operator">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle operator-name" data-toggle="dropdown" role="button" aria-expanded="false">
                            bjbsyariah <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('admin');?>">
                                    Panel
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/logout');?>" style="background-color:white">
                                    <img class="logout-btn" src="<?php echo base_url('assets/images/logout-button.png');?>"></img>
                                </a>
                            </li>
                            <div class="clearfix"></div>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
            
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">
                    <!--<img src="http://ms-bjbsyariah.com/images/logo.png" alt="Wahana"/>-->
                </a>
            </div>
        </div><!-- /.container -->
    </nav>
    
    <div class="container">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row mrg-top-20">
                    <?php foreach($laporan as $lap){
                        ?>
                            <div class="col-sm-9 kunjungan">
                                <div class="kunjungan-id"><?php echo $lap->nama;?></div>
                                <div>Start :</div>
                                <div><?php echo nama_hari($lap->start_date);?>, <?php echo tgl_indo($lap->start_date);?></div>
                                <div>End :</div>
                                <div><?php echo nama_hari($lap->end_date);?>, <?php echo tgl_indo($lap->end_date);?></div>
                                <div><a class="white" href="<?php echo site_url('home/session/'.$lap->id);?>">Go &#9654;</a></div>
                            </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar-fixed-bottom">
        <nav class="navbar navbar-copyright navbar-bottom" role="navigation">
            <div class="container">
                <p class="text-center" id="copyright">RAD Research &copy; 2016</p>
                <img src="<?php echo base_url('assets/images/rad-putih.png');?>"></img>
            </div><!-- /.container -->
        </nav>
    </div>

    <script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/script.js');?>"></script>

    </body>
</html>