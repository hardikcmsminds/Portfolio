<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Ace Admin</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{ URL::asset('public/assets/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('public/assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
		<!-- page specific plugin styles -->
		<!-- text fonts -->
		<link rel="stylesheet" href="{{ URL::asset('public/assets/css/fonts.googleapis.com.css') }}" />
		<!-- ace styles -->
		<link rel="stylesheet" href="{{ URL::asset('public/assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{ URL::asset('public/assets/css/ace-skins.min.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('public/assets/css/ace-rtl.min.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('public/assets/css/toastr.min.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('public/assets/css/select2.min.css') }}" />
		<style type="text/css">.dataTable>thead>tr>th[class*=sorting_]{color: inherit;}
		.select2-container--default .select2-selection--multiple,.select2-container--default.select2-container--focus .select2-selection--multiple {
			border: 1px solid #D5D5D5;
		}
		</style>
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<!-- inline styles related to this page -->
		<!-- ace settings handler -->
		<script src="{{ URL::asset('public/assets/js/ace-extra.min.js') }}"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="{{ url('admin/dashboard') }}" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							CMS Admin
						</small>
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="{{ URL::asset('public/assets/images/avatars/user.jpg') }}" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Admin
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!-- <li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li> -->
								<!-- <li class="divider"></li> -->
								<li>
									<a href="{{ url('/admin/logout') }}">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>