<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->titulo .' '. $this->company . ' | ' . $this->tagline ;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="<?php echo $_layoutParams['ruta_plugin']?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $_layoutParams['ruta_plugin']?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link href="<?php echo $_layoutParams['ruta_plugin']?>Ionicons/css/ionicons.min.css" rel="stylesheet">
    <!-- jvectormap -->
    <link href="<?php echo $_layoutParams['ruta_plugin']?>jvectormap/jquery-jvectormap.css" rel="stylesheet">
    <!-- jvectormap -->
    <link href="<?php echo $_layoutParams['ruta_plugin']?>bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $_layoutParams['ruta_addon']?>pace/pace.min.css">
    <!-- Theme style -->
    <link href="<?php echo $_layoutParams['ruta_css']?>AdminLTE.min.css" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo $_layoutParams['ruta_css']?>skins/_all-skins.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo $_layoutParams['ruta_img']?>favicon.png">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<ul class="wrapper" style="padding-left: 0px;">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo BASE_URL;?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"  style=" padding-top: 40%;"><img src="<?php echo $_layoutParams['ruta_img']?>favicon.png" class="user-image" style="width: 70%; height: 70%;"></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b><?php echo APP_NAME;?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php if(Sessions::get('autenticado')):?>
                        <!--User-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo $_layoutParams['ruta_img']?>user.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo Sessions::get('nombres');?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo $_layoutParams['ruta_img']?>user.png" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo Sessions::get('nombres');?>
                                        <small><?php echo Sessions::get('level');?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?php echo BASE_URL. 'login/logout';?>" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </nav>
    </header>
    <?php if(Sessions::get('autenticado')):?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu Principal</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Clientes</span>
                        <span class="pull-right-container">
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo BASE_URL. 'pacientes';?>"><i class="fa fa-circle-o"></i> Registro de Pacientes</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Exámenes</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo BASE_URL. 'examenes';?>"><i class="fa fa-circle-o"></i> Tipos</a></li>
                        <li><a href="<?php echo BASE_URL;?>"><i class="fa fa-circle-o"></i> Valores de Referencia</a></li>
                        <li><a href="<?php echo BASE_URL.'examenes/cargadatos';?>"><i class="fa fa-circle-o"></i> Carga de Datos</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <?php endif;?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="padding-bottom: 25%;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $this->titulo ?>
            </h1>
        </section>
<section class="content">