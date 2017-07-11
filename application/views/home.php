<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1">
		<title><?php echo $title; ?></title>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
		
		<!-- CSS Here -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/tabs-accordion.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/calendar.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/default.css" />
		
		<!-- Javascript Here -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
		
		
		
		
	</head>
	
	<body>
		<div id="container">
			<div id="header">
				<div class="header-left"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Dipta Logistics" title="Dipta Logistics" height="33px" /></div>
				<div class="header-right">
					<div class="hr3"><img src="<?php echo base_url(); ?>assets/images/193.png" alt="Logout" title="Logout"/></div>
					<div class="hr4"><a href="<?php echo base_url(); ?>main/logout" title="Logout">Logout</a></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div> <!-- End of header -->
			
			<div id="content">
				<div class="content-left">
					<div class="cl-top">
						<div class="clt-left"><img src="<?php echo base_url(); ?>assets/images/user.png" alt="user" /></div>
						<div class="clt-right">
							<h4><?php echo $this->session->userdata('admfullname'); ?></h4>
							Last Login : <?php echo date("d F Y H:i:s"); ?>
						</div>
						<div class="clear"></div>
					</div>
					
					<!--<div class="cl-bottom">
						<div id="accordion">
							<h2>Order</h2>
							<div class='pane'>
								<a href='<?php echo base_url(); ?>order/addorder'>&#187; Add Order</a><br>
								<a href='<?php echo base_url(); ?>order'>&#187; View All Order</a><br>
							</div>
							
							<h2>Client</h2>
							<div class='pane'>
								<a href='<?php echo base_url(); ?>client/addclient'>&#187; Tambah Client</a><br>
								<a href='<?php echo base_url(); ?>client'>&#187; Client</a><br>
								<a href='<?php echo base_url(); ?>category'>&#187; Category</a><br>
								<a href='<?php echo base_url(); ?>broker'>&#187; Broker</a><br>
							</div>
							
							<h2>Saham</h2>
							<div class='pane'>
								<a href='<?php echo base_url(); ?>saham/addsaham'>&#187; Add Saham</a><br>
								<a href='<?php echo base_url(); ?>saham'>&#187; View All Saham</a><br>
							</div>
							
							<h2>Administrator</h2>
							<div class='pane'>
								<a href='<?php echo base_url(); ?>admin/addadmin'>&#187; Add Administrator</a><br>
								<a href='<?php echo base_url(); ?>admin'>&#187; View All Administrator</a><br>
							</div>
							
							
						</div>
						<script>
							$(function() { 
								$("#accordion").tabs("#accordion div.pane", {tabs: 'h2', effect: 'slide', initialIndex: null});
							});
						</script>
					</div> <!-- End of cl-bottom -->
					
					
				</div> <!-- End of content-left -->
				<div class="content-right">
					<div class="cr-top">
						<div class="crt-left">
							<h4>Dashboard</h4>
							<div class="breadcrumb">
								<a href="<?php echo base_url(); ?>dashboard">Home</a> -&#187; <?php echo $name; ?>
							</div> <!-- End of breadcrumb -->
						</div>
						<div class="crt-right">
								<div class="content-menu">
									<ul>
										<li><a href='<?php echo base_url(); ?>order'>View All Orders</a></li>
										<li>
											<div class="dropdown">
											  <button class="btnfree dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												Report
												<span class="caret"></span>
											  </button>
											  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
												<li><a href="<?php echo base_url(); ?>report/selisih">Selisih per Email</a></li>
											  </ul>
											</div>
										</li>
										<li>
											<div class="dropdown">
											  <button class="btnfree dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												Client
												<span class="caret"></span>
											  </button>
											  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
												<li><a href="<?php echo base_url(); ?>client">View Client</a></li>
												<li><a href="<?php echo base_url(); ?>category">Category</a></li>
												<li><a href="<?php echo base_url(); ?>broker">Broker</a></li>
											  </ul>
											</div>
										</li>
										<li><a href='<?php echo base_url(); ?>saham'>Saham</a></li>
										<li><a href='<?php echo base_url(); ?>admin'>Administrator</a></li>
									</ul>
								</div>
							</div> <!-- End of crt-right -->
							<div class="clear"></div>
					</div> <!-- End of cr-top -->
					
					
				</div> <!-- End of content-right -->
				<div class="clear"></div>
			</div>
			<div class="content-text">
				<?php
					$this->load->view($content);
				?>
			</div>
		</div>
		
		
		
	</body>
</html>