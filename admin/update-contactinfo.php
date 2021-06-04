<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	// Code for change password	
	if (isset($_POST['submit'])) {

		$address   = $_POST['address'];
		$email     = $_POST['email'];
		$phone = $_POST['contactno'];

		$sql = "update contactusinfo set address = :address, email = :email, phone = :phone";

		$query = $conn->prepare($sql);

		$query->bindParam(':address', $address, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':phone', $phone, PDO::PARAM_STR);

		$query->execute();

		$msg = " Info Updateed successfully";
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
		<title>Update Contact Info</title>
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
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Update Contact Info</h4>
								</div>

								<div class="card-body">
									<form method="post" class="form-horizontal" >

										<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

										<?php $sql = "SELECT * from  contactusinfo ";

										$query = $conn->prepare($sql);

										$query->execute();

										$results = $query->fetchAll(PDO::FETCH_OBJ);
										$cnt = 1;
										if ($query->rowCount() > 0) {
											foreach ($results as $result) {				?>
												<div class="row">
													<div class="col-xl-10 col-md-6 col-sm-12 mb-2">
														<label for="credit-card">Address</label>
														<textarea class="form-control credit-card-mask" name=" address" id="address" required><?= strip_tags($result->Address) ?></textarea>

													</div>

													<div class="col-xl-10 col-md-6 col-sm-12 mb-2">
														<label for="credit-card">Email</label>
														<input type="email" class="form-control credit-card-mask" name="email" value="<?= $result->Email ?>" required>
													</div>

													<div class="col-xl-10 col-md-6 col-sm-12 mb-2">
														<label for="credit-card">Contact Number</label>
														<input type="text" class="form-control credit-card-mask" value="<?= $result->phone ?>" name="contactno" required>

													</div>
											<?php }
										} ?>

											<div class="col-xl-4 col-md-6 col-sm-12 mb-2">
												<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
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