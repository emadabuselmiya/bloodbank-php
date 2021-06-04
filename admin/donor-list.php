<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['hidden'])) {

		$eid    = intval($_GET['hidden']);
		$status = "0";

		$sql = "UPDATE blooddonar SET status = :status WHERE  id = :eid ";

		$query = $conn->prepare($sql);

		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);

		$query->execute();

		$msg = " Booking Successfully Cancelled";
	}


	if (isset($_REQUEST['public'])) {

		$aeid   = intval($_GET['public']);
		$status = 1;

		$sql = "UPDATE blooddonar SET status = :status WHERE  id = :aeid ";

		$query = $conn->prepare($sql);

		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':aeid', $aeid, PDO::PARAM_STR);

		$query->execute();

		$msg = " Booking Successfully Confirmed";
	}


	if (isset($_REQUEST['del'])) {
		$did = intval($_GET['del']);

		$sql = "delete from blooddonar WHERE  id = :did";

		$query = $conn->prepare($sql); 

		$query->bindParam(':did', $did, PDO::PARAM_STR);

		$query->execute();

		$msg = " Record deleted Successfully ";
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
		<title>Donors List</title>
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

		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>

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
						<div class="col-md-14">

							<div class="card">

								<div class="card-header">
									<h4 class="card-title">Donors List</h4>
								</div>

								<div class="card-body">

									<!-- Zero Configuration Table -->
									<div class="panel panel-default">
										<div class="panel-body">
											<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
											<a href="download-records.php" style="color:red; font-size:16px;">Download Donor List</a>
											<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>#</th>
														<th>Name</th>
														<th>Phone</th>
														<th>Email</th>
														<th>Age</th>
														<th>Gender</th>
														<th>Blood Group</th>
														<th>address</th>
														<th>action </th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>#</th>
														<th>Name</th>
														<th>Phone</th>
														<th>Email</th>
														<th>Age</th>
														<th>Gender</th>
														<th>Blood Group</th>
														<th>address</th>
														<th>action </th>
													</tr>
												</tfoot>
												<tbody>

													<?php $sql = "SELECT * from  blooddonar ";
													$query = $conn->prepare($sql);
													$query->execute();
													$results = $query->fetchAll(PDO::FETCH_OBJ);
													$cnt = 1;
													if ($query->rowCount() > 0) {
														foreach ($results as $result) {				?>
															<tr>
																<td><?= $cnt ?></td>
																<td><?= $result->fullname ?></td>
																<td><?= $result->phone ?></td>
																<td><?= $result->email ?></td>
																<td><?= $result->gender ?></td>
																<td><?= $result->age ?></td>
																<td><?= $result->bloodgroup ?></td>
																<td><?= $result->address ?></td>


																<td>
																	<?php if ($result->status == 1) { ?>
																		<a href="donor-list.php?hidden=<?= $result->id ?>" onclick="return confirm('Do you really want to hiidden this detail')"> Make Hidden</a>
																	<?php } else { ?>

																		<a href="donor-list.php?public=<?= $result->id ?>" onclick="return confirm('Do you really want to Public this detail')"> Make Public</a>

																	<?php } ?>
																	<a href="donor-list.php?del=<?= $result->id ?>" onclick="return confirm('Do you really want to delete this record')"> Delete</a>
																</td>

															</tr>
													<?php $cnt = $cnt + 1;
														}
													} ?>

												</tbody>
											</table>



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
	</body>
	<!-- END: Body-->

	</html>

<?php } ?>