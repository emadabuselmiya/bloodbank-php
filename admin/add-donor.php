<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['submit'])) {
		$fullname  = $_POST['fullname'];
		$mobile    = $_POST['phone'];
		$email     = $_POST['email'];
		$age       = $_POST['age'];
		$gender    = $_POST['gender'];
		$blodgroup = $_POST['bloodgroup'];
		$address   = $_POST['address'];
		$message   = $_POST['message'];
		$status    = 1;

		$sql = "INSERT INTO  blooddonar(fullname, phone, email, age, gender, bloodgroup, address, message, status) VALUES(:fullname,:mobile,:email,:age,:gender,:blodgroup,:address,:message,:status)";
		$query = $conn->prepare($sql);

		$query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
		$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':age', $age, PDO::PARAM_STR);
		$query->bindParam(':gender', $gender, PDO::PARAM_STR);
		$query->bindParam(':blodgroup', $blodgroup, PDO::PARAM_STR);
		$query->bindParam(':address', $address, PDO::PARAM_STR);
		$query->bindParam(':message', $message, PDO::PARAM_STR);
		$query->bindParam(':status', $status, PDO::PARAM_STR);

		if ($query->execute()) {
			$msg = " Your info submitted successfully";
		} else {
			$error = " Something went wrong. Please try again";
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
		<title>Add Donor</title>
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
									<h4 class="card-title">Add Donor</h4>
								</div>
								<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?= $error ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?= $msg ?> </div><?php } ?>

								<div class="card-body">
									<form method="post" class="form-horizontal" enctype="multipart/form-data">
										<div class="row">
											<div class="col-xl-4 col-md-6 col-sm-12 mb-2">
												<label for="credit-card">Full Name <span style="color:red"> * </span> </label>
												<input type="text" class="form-control credit-card-mask" name="fullname" required />
											</div>
											<div class="col-xl-4 col-md-6 col-sm-12 mb-2">
												<label for="phone-number">Phone Number <span style="color:red"> * </span> </label>
												<div class="input-group input-group-merge">
													<input type="text" class="form-control phone-number-mask" name="phone" placeholder="0592 666 666" required />
												</div>
											</div>

											<div class="col-xl-4 col-md-6 col-sm-12 mb-2">
												<label for="time">Email</label>
												<input type="email" class="form-control time-mask" name="email" placeholder="emad@example.com" />
											</div>

											<div class="col-xl-4 col-md-6 col-sm-12 mb-2">
												<label for="date">Age <span style="color:red"> * </span> </label>
												<input type="text" class="form-control date-mask" name="age" required />
											</div>

											<div class="col-xl-4 col-md-6 col-sm-12 mb-2">
												<label for="numeral-formatting">Gender <span style="color:red"> * </span> </label>
												<select name="gender" class="form-control numeral-mask" required>
													<option value="">Select</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
											<div class="col-xl-4 col-md-6 col-sm-12 mb-2">
												<label for="blocks">Blood Group <span style="color:red"> * </span> </label>
												<select name="bloodgroup" class="form-control block-mask" required>
													<option value="">Select</option>
													<?php $sql = "SELECT * from  bloodgroup ";
													$query = $conn->prepare($sql);
													$query->execute();
													$results = $query->fetchAll(PDO::FETCH_OBJ);
													$cnt = 1;
													if ($query->rowCount() > 0) {
														foreach ($results as $result) {
													?>
															<option value="<?= $result->name ?>"><?= $result->name ?></option>
													<?php }
													} ?>
												</select>
											</div>
											<div class="col-xl-6 col-md-12 col-sm-6 mb-2">
												<label for="delimiters">Address</label>
												<textarea class="form-control delimiter-mask" name="address"></textarea>
											</div>
											<div class="col-xl-6 col-md-12 col-sm-6 mb-2">
												<label for="custom-delimiters">Message <span style="color:red"> * </span> </label>
												<textarea class="form-control custom-delimiter-mask" name="message" required> </textarea>
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