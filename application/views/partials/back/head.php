<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<title> Admin Penjualan</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style_responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style_default.css" rel="stylesheet" id="style_color" />

	<link href="<?php echo base_url(); ?>assets/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/uniform/css/uniform.default.css" />
	<link href="<?php echo base_url(); ?>assets/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/jquery-ui/jquery-ui-1.10.1.custom.min.css"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
	<!-- BEGIN HEADER -->
    <div id="header" class="navbar navbar-inverse navbar-fixed-top">
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <div class="container-fluid">
                <!-- BEGIN LOGO -->
                <a class="brand" href="#">
                    <img src="<?php echo base_url() ?>assets/img/logo2.png" alt="Admin" />
                </a>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="arrow"></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->                
                <div class="top-nav ">
                    <ul class="nav pull-right top-menu" >                        
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="username">Admin</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() ?>Adm_pass"><i class="icon-user"></i> Password</a></li>
                                <li><a href="Welcome/Logout"><i class="icon-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div id="sidebar" class="nav-collapse collapse">
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

			
			<!-- BEGIN SIDEBAR MENU -->
            <ul class="sidebar-menu">
            	<li><a class="" href="<?php echo base_url() ?>Adm_dash"><span class="icon-box"><i class="icon-dashboard"></i></span> Dashboard</a></li>                
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url() ?>Adm_spare">Sparepart</a></li>
                        <li><a class="" href="<?php echo base_url() ?>Adm_pel">Pelanggan</a></li>
                        <li><a class="" href="<?php echo base_url() ?>Adm_tek">Teknisi</a></li>
                        <li><a class="" href="<?php echo base_url() ?>Adm_usr">Pengguna</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Transaksi
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="Adm_ord">Order</a></li>
                        <li><a class="" href="<?php echo base_url() ?>Adm_ser">Service</a></li>
                        <li><a class="" href="<?php echo base_url() ?>Adm_pjl">Penjualan</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="<?php echo base_url() ?>Adm_graf">Grafik</a></li>
                        <li><a class="" href="<?php echo base_url() ?>Adm_rord">Order</a></li>
                        <li><a class="" href="<?php echo base_url() ?>Adm_rser">Service</a></li>
                        <li><a class="" href="<?php echo base_url() ?>Adm_rpjl">Penjualan</a></li>
                        <li><a class="" href="<?php echo base_url() ?>Adm_pdtk">Pendapatan Teknisi</a></li>
                    </ul>
                </li>
                <li><a class="" href="<?php echo base_url() ?>Welcome/Logout"><span class="icon-box"><i class="icon-lock"></i></span> Logout</a></li>
            </ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->