
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content="Jamal Apriadi"/>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" />

    
            <!--<style>
            body {
                padding-bottom: 160px;
            }
        </style>-->
        
        
                <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <nav class="navbar navbar-default navbar-top" role="navigation">
        <div style="height:70px;"></div>
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
                                <a href="<?php echo site_url('auth/logout');?>" style="background-color:white">
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
                    <div class="col-sm-9 kunjungan">
                        <div class="kunjungan-id">KUNJUNGAN 1</div>
                        <div>Start :</div>
                        <div>Kamis, 01 Oktober 2015</div>
                        <div>End :</div>
                        <div>Kamis, 19 Nopember 2015</div>
                        <div><a class="white" href="<?php echo site_url('session/kunjungan/1');?>">Go &#9654;</a></div>
                    </div>
                    
                    <div class="col-sm-9 kunjungan">
                        <div class="kunjungan-id">KUNJUNGAN 2</div>
                        <div>Start :</div>
                        <div>Senin, 23 Nopember 2015</div>
                        <div>End :</div>
                        <div>Selasa, 29 Desember 2015</div>
                        <div><a class="white" href="http://ms-bjbsyariah.com/session/kunjungan/2">Go &#9654;</a></div>
                    </div>
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