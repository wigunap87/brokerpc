<html>
	<head>
		<title>System Information Administrator</title>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
		
		<!-- CSS Here -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style-login.css" />
		
		<!-- Javascript Here -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/controller/LoginController.js"></script>
	</head>
	
	<body ng-app="myApp" ng-controller="LoginController">
		<div id="container">
			<div id="content">
				<div class="content-head">
					<div class="ch-left">
						<img src="<?php echo base_url(); ?>assets/images/logo-green.png" alt="System Information" />
					</div>
					<!--<div class="ch-right"><img src="assets/images/icon-keys.png" alt="Sign In" title="Sign In" /></div>-->
					<div class="ch-right2">Administrator Sign In</div>
					<div class="clear"></div>
				</div>
				<div class="content-cont">
					<form method="post" ng-submit="myLogin()" name="login" id="login" autocomplete="off" data-toggle="validator">
					<div class="cc-form">
						<div class="field">
							<div class="field-title">Email</div>
							<div class="field-info"><input type="email" ng-model="_email" name="_email" maxlength="100" required /></div>
							<div class="clear"></div>
						</div>
						<div class="fields">
							<div class="field-title">Password</div>
							<div class="field-info"><input type="password" ng-model="_passwd" name="_passwd" maxlength="100" required /></div>
							<div class="clear"></div>
						</div>
						
						<div align=center><font color="red">{{errorMsg}}</font></div>
					</div>
					<div class="cc-submit">
						<div class="ccs-left">Copyright &copy; 2017</div>
						<div class="ccs-right"><input type="submit" name="submit" value="Sign In" /></div>
						<div class="clear"></div>
					</div>
					<!--</form>-->
				</div>
			</div> <!-- End of content -->
		</div> <!-- End of Container -->
	</body>
</html>