<!DOCTYPE html>
<html>

<head>

	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>School Manager </title>


    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/sb-admin.css" >

	<!-- jquery-ui css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style/jquery-ui.min.css" >
	
	
    <!-- Morris Charts CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/plugins/morris.css" >

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/font-awesome-4.1.0/css/font-awesome.min.css" >

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <!-- jQuery Version 2.1.1 -->
	<script src="<?php echo base_url(); ?>bootstrap/js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	
    <!-- tablesorter.min.js -->
	<script src="<?php echo base_url(); ?>scripts/jquery.tablesorter.min.js" type="text/javascript" charset="utf-8"></script>
	
	<!-- jQuery User Interface JS-->
	<script src="<?php echo base_url(); ?>scripts/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
	

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>home" ><?php echo $this->session->userdata('client_name'); ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $this->session->userdata('f_name').' '.$this->session->userdata('l_name'); ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $this->session->userdata('f_name').' '.$this->session->userdata('l_name'); ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $this->session->userdata('f_name').' '.$this->session->userdata('l_name'); ?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('f_name').' '.$this->session->userdata('l_name'); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>settings/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>settings/termDates"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
			
			<!-- activate the date picker -->
			<script>
			$(function(){
				$('.datepicker').datepicker({
					changeMonth:true,
					changeYear:true,
					yearRange: "-100:+0",
					dateFormat:"@",
					appendText: "(yyyy-mm-dd)"
				});
				
				
			});
			</script>
			
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active"><a href="<?php echo base_url(); ?>home"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
                    <li class="active"><a href="javascript: ;" data-toggle="collapse" data-target="#reg_options"><i class="fa fa-fw fa-edit"></i> Registration</a>
						<ul id="reg_options" class="collapse">
						<?php 
						if($this->session->userdata('usertype') != 'admin' && $this->session->userdata('usertype') != 'admissions')
						{
						?>
							<li><a href="<?php echo base_url(); ?>admissions/records">View Records</a></li>
							<li><a href="<?php echo base_url(); ?>admissions/classes">Classes</a></li>
						<?php
						}
						else
						{
						?>
							<li><a href="<?php echo base_url(); ?>admissions/addNewStudent">Add New Student</a></li>
							<li><a href="<?php echo base_url(); ?>admissions/records">View Records</a></li>
							<li ><a href="<?php echo base_url(); ?>admissions/edit_records">Edit Records</a></li>
						
						<?php
						}
						
						?>
						</ul>
					</li>
					<li class="active"><a href="javascript: ;" data-toggle="collapse" data-target="#academics_options"><i class="fa fa-fw fa-file"></i> Examinations</a>
						<ul id="academics_options" class="collapse">
						<?php
						if($this->session->userdata('usertype') != 'admin' && $this->session->userdata('usertype') != 'academics')
						{
						?>
							<li><a href="<?php echo base_url(); ?>academics/spreadsheets">Spreadsheets</a></li>
							<li><a href="<?php echo base_url(); ?>academics/reports">Reports</a></li>
						<?php
						}
						else
						{
						?>
							<li><a href="<?php echo base_url(); ?>academics/enter_marks/enter_marks">Enter Marks</a></li>
							<li><a href="<?php echo base_url(); ?>academics/enter_marks/get_marks">View/Edit Marks</a></li>
							<li><a href="<?php echo base_url(); ?>academics/spreadsheets">Spreadsheets</a></li>
							<li><a href="<?php echo base_url(); ?>academics/reports">Reports</a></li>
							<li><a href="<?php echo base_url(); ?>academics/grading">Set Grading</a></li>
						<?php
						}
						?>
						</ul>
					</li>
					<li class="active"><a href="javascript: ;" data-toggle="collapse" data-target="#system_options"><i class="fa fa-fw fa-wrench"></i>System </a>
						<ul id="system_options" class="collapse">
						<?php
						if($this->session->userdata('usertype') == 'admin')
						{
						?>
							<li><a href="<?php echo base_url(); ?>settings/addNewUser">Add Users</a></li>
							<li><a href="<?php echo base_url(); ?>settings/manageUsers">Manage Users</a></li>
						<?php
						}
						else
						{
						?>
							<li><a href="<?php echo base_url(); ?>settings/profile">Update Profile</a></li>
						
						<?php
						}
						?>
						</ul>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
		
		<div id="page-wrapper">

            <div class="container-fluid">
