<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	// Code for change password	
	if (isset($_POST['submit'])) { 

		$password    = md5($_POST['password']);
		$newpassword = md5($_POST['newpassword']);
		$username    = $_SESSION['alogin'];

		$sql = "SELECT Password FROM admin WHERE userName=:username and password=:password";

		$query = $conn->prepare($sql);

		$query->bindParam(':username', $username, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);

		$query->execute();

		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() > 0) {
			$con = "update admin set password=:newpassword where username=:username";
			$chngpwd1 = $conn->prepare($con);
			$chngpwd1->bindParam(':username', $username, PDO::PARAM_STR);
			$chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$chngpwd1->execute();
			$msg = " Your Password succesfully changed";

		} else {
			$error = " Your current password is not valid.";
		}
	}
?>


	<!DOCTYPE html>
	<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
	<!-- BEGIN: Head-->

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
		<meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
		<meta name="author" content="PIXINVENT">
		<title>Change Password</title>
		<link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
		<link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

		<!-- BEGIN: Vendor CSS-->
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/calendars/fullcalendar.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
		<!-- END: Vendor CSS-->

		<!-- BEGIN: Theme CSS-->
		<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

		<!-- BEGIN: Page CSS-->
		<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-calendar.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-validation.css">
		<!-- END: Page CSS-->

		<!-- BEGIN: Custom CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<!-- END: Custom CSS-->

		<script type="text/javascript">
			function valid() {
				if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
					alert("New Password and Confirm Password Field do not match  !!");
					document.chngpwd.confirmpassword.focus();
					return false;
				}
				return true;
			}
		</script>

	</head>
	<!-- END: Head-->

	<!-- BEGIN: Body-->

	<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">


		<?php include('includes/header.php'); ?>

		<!-- BEGIN: Main Menu-->
		<?php include('includes/menu.php'); ?>
		<!-- END: Main Menu-->

		<!-- BEGIN: Content-->

		<div class="app-content content ">
			<div class="content-overlay"></div>
			<div class="header-navbar-shadow"></div>
			<div class="content-wrapper">
				<div class="content-header row">
				</div>
				<div class="content-body">
					<div class="row">
						<div class="col-md-12">


							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header">
											<h4 class="card-title">Change Password</h4>
										</div>
										<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

										<div class="card-body">
											<form method="post" class="form-horizontal" enctype="multipart/form-data">
												<div class="row">
													<div class="col-xl-10 col-md-6 col-sm-12 mb-2">
														<label for="credit-card">Current Password</label>
														<input type="text" class="form-control credit-card-mask" name="password" id="password" required/>
													</div>
													<div class="col-xl-10 col-md-6 col-sm-12 mb-2">
														<label for="phone-number">New Password</label>
														<div class="input-group input-group-merge">
															<input type="text" class="form-control phone-number-mask" name="newpassword" id="newpassword" required/>
														</div>
													</div>

													<div class="col-xl-10 col-md-6 col-sm-12 mb-2">
														<label for="time">Confirm Password</label>
														<input type="text" class="form-control time-mask" name="confirmpassword" id="confirmpassword" required/>
													</div>

													<div class="col-xl-4 col-md-6 col-sm-12 mb-2">
														<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
														<button class="btn btn-default" type="reset">Cancel</button>
													</div>

												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
			
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- END: Content-->

		<div class="sidenav-overlay"></div>
		<div class="drag-target"></div>



		<!-- BEGIN: Vendor JS-->
		<script src="app-assets/vendors/js/vendors.min.js"></script>
		<!-- BEGIN Vendor JS-->

		<!-- BEGIN: Page Vendor JS-->
		<script src="app-assets/vendors/js/calendar/fullcalendar.min.js"></script>
		<script src="app-assets/vendors/js/extensions/moment.min.js"></script>
		<script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
		<script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
		<script src="app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
		<!-- END: Page Vendor JS-->

		<!-- BEGIN: Theme JS-->
		<script src="app-assets/js/core/app-menu.js"></script>
		<script src="app-assets/js/core/app.js"></script>
		<!-- END: Theme JS-->

		<!-- BEGIN: Page JS-->
		<script src="app-assets/js/scripts/pages/app-calendar-events.js"></script>
		<script src="app-assets/js/scripts/pages/app-calendar.js"></script>
		<!-- END: Page JS-->

		<script>
			$(window).on('load', function() {
				if (feather) {
					feather.replace({
						width: 14,
						height: 14
					});
				}
			})
		</script>
	</body>
	<!-- END: Body-->

	</html>

<?php } ?>