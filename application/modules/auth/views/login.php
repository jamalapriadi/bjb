<!DOCTYPE html>
<html lang="en" ng-app="bjbApp">
<head>
  <meta charset="UTF-8">
  <meta charset="utf-8"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content="Jamal Apriadi"/>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png');?>" />
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="row" style="height:100%; background-image:url('<?php echo base_url();?>assets/images/login-bg.jpg'); background-size:cover;">

  <div class="container">
    <nav class="navbar navbar-top"></nav>
        
    <div class="col-sm-6 col-sm-offset-3 text-center" style="margin-top: 3%">
      <img style="width:60%" src=" <?php echo base_url('assets/images/logo.png');?> " />
      <div class="box box-solid">
        <div class="box-body login-form">
          <div id="infoMessage"><?php echo $message;?></div>

          <?php echo form_open("auth/login");?>
            <div class="row">
              <div class="col-lg-7 col-lg-push-2">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-envelope"></i>
                  </span>
                  <?php echo form_input($identity);?>
                </div>

                <br>

                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-lock"></i>
                  </span>

                  <?php echo form_input($password);?>
                </div>
              </div>

              <div class="col-lg-3 col-lg-push-2" style="margin-left:-20px">
                <button type="submit">
                  <img src="<?php echo base_url('assets/images/login-button.png');?>">
                </button>
              </div>
              <!--
              <p>
              <?php echo lang('login_remember_label', 'remember');?>
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
              </p>
              -->
            </div>

          <?php echo form_close();?>
                  <!--
                  <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                  -->
        </div>
        <div class="clearfix"></div>
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
</body>
</html>