<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Service System</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plg/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plg/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plg/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plg/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plg/css/responsive.css">
  </head>
  <body>
<?php $ins = $this->session->userdata("email"); ?>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <?php if($ins==null){ ?>
                            <li><a href="<?php echo base_url(); ?>Clt_reglog"><i class="fa fa-user"></i> Login Pelanggan</a></li>
                            <?php }else{?>
                            <li><a href="<?php echo base_url(); ?>Clt_pass"><i class="fa fa-user"></i> My Account</a></li><?php }?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                          <?php if($ins==null){ ?>
                            <li><a href="<?php echo base_url(); ?>Adm_log"><i class="fa fa-user"></i> Login Admin</a></li>
                          <?php }else{?>
                            <li><a href="<?php echo base_url(); ?>Welcome/Logout"><i class="fa fa-close"></i>Logout</a></li>
                          <?php } ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><img style="width: 80px;height: 80px;" src="<?php echo base_url() ?>assets/img/logoasa.jpg"> &nbsp;<a style="color:#FF0000" href="<?php echo base_url(); ?>">ASA COM</a></h1>
                        <p>Jalan Teuku Umar No 16 Kedaton Bandar Lampung (0721) 788345</p>
                    </div>
                </div>
               
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <?php if($ins!=null){ ?>
                        <li><a href="<?php echo base_url(); ?>Clt_ordser">Order Servis</a></li>
                        <?php } ?>
                        <li><a href="<?php echo base_url(); ?>Clt_visi">Visi-Misi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->
