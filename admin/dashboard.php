<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
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
		<title>Dashboard</title>
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
							<div class="col-xl-12 col-md-6 col-12">
								<div class="card card-statistics">
									<div class="card-header">
										<h4 class="card-title">Dashboard</h4>
										<div class="d-flex align-items-center">
										</div>
									</div>
									<div class="card-body statistics-body">
										<div class="row">
											<div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
												<div class="media">
													<div class="avatar bg-light-primary mr-2">
														<div class="avatar-content">
															<i data-feather="user" class="avatar-icon"></i>
														</div>
													</div>
													<div class="media-body my-auto">
														<?php
														$sql1 = "SELECT id from contactusquery ";
														$query1 = $conn->prepare($sql1);;
														$query1->execute();
														$count1 = $query1->rowCount();
														?>
														<h4 class="font-weight-bolder mb-0"><?= $count1 ?></h4>
														<p class="card-text font-small-3 mb-0">Total Quries</p>
														<a href="manage-conactusquery.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>

													</div>
												</div>
											</div>
											<div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
												<div class="media">
													<div class="avatar bg-light-info mr-2">
														<div class="avatar-content">
															<i data-feather="user" class="avatar-icon"></i>
														</div>
													</div>
													<div class="media-body my-auto">
														<?php
														$sql2 = "SELECT id from blooddonar ";
														$query2 = $conn->prepare($sql2);;
														$query2->execute();
														$count2 = $query2->rowCount();
														?>
														<h4 class="font-weight-bolder mb-0"><?= $count2 ?></h4>
														<p class="card-text font-small-3 mb-0">Registered Blood Group</p>
														<a href="donor-list.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>

														
													</div>
												</div>
											</div>
											<div class="col-xl-4 col-sm-6 col-12 mb-2 mb-sm-0">
												<div class="media">
													<div class="avatar bg-light-danger mr-2">
														<div class="avatar-content">
															<i data-feather="user" class="avatar-icon"></i>
														</div>
													</div>
													<div class="media-body my-auto">
														<?php
														$sql3 = "SELECT id from bloodgroup ";
														$query3 = $conn->prepare($sql3);
														$query3->execute();
														$count3 = $query3->rowCount();
														?>

														<h4 class="font-weight-bolder mb-0"><?= $count3 ?></h4>
														<p class="card-text font-small-3 mb-0">Listed Blood Groups</p>
														<a href="manage-bloodgroup.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>

													</div>
												</div>
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

			<script>
				window.onload = function() {

					// Line chart from swirlData for dashReport
					var ctx = document.getElementById("dashReport").getContext("2d");
					window.myLine = new Chart(ctx).Line(swirlData, {
						responsive: true,
						scaleShowVerticalLines: false,
						scaleBeginAtZero: true,
						multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
					});

					// Pie Chart from doughutData
					var doctx = document.getElementById("chart-area3").getContext("2d");
					window.myDoughnut = new Chart(doctx).Pie(doughnutData, {
						responsive: true
					});

					// Dougnut Chart from doughnutData
					var doctx = document.getElementById("chart-area4").getContext("2d");
					window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {
						responsive: true
					});

				}
			</script>
	</body>
	<!-- END: Body-->

	</html>

<?php } ?>