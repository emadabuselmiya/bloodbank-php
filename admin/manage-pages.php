<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if ($_POST['submit'] == "Update") {

		$pagetype    = $_GET['type'];
		$pagedetails = $_POST['pgedetails'];

		$sql = "UPDATE pages SET detail = :pagedetails WHERE type = :pagetype";

		$query = $dbh->prepare($sql);

		$query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
		$query->bindParam(':pagedetails', $pagedetails, PDO::PARAM_STR);

		$query->execute();
		$msg = " Page data updated  successfully";
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
		<title>Manage Pages</title>
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

		<script type="text/JavaScript">
			<!--
				function MM_findObj(n, d) { //v4.01
				var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
					d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
				if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
				for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
				if(!x && d.getElementById) x=d.getElementById(n); return x;
				}

				function MM_validateForm() { //v4.0
				var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
				for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
					if (val) { nm=val.name; if ((val=val.value)!="") {
					if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
						if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
					} else if (test!='R') { num = parseFloat(val);
						if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
						if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
						min=test.substring(8,p); max=test.substring(p+1);
						if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
					} } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
				} if (errors) alert('The following error(s) occurred:\n'+errors);
				document.MM_returnValue = (errors == '');
				}

				function MM_jumpMenu(targ,selObj,restore){ //v3.0
				eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
				if (restore) selObj.selectedIndex=0;
				}
				//-->
		</script>
		<script type="text/javascript" src="nicEdit.js"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(function() {
				nicEditors.allTextAreas()
			});
		</script>

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
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Manage Pages</h4>
								</div>

								<div class="card-body">
									<form method="post" class="form-horizontal" enctype="multipart/form-data">
										<div class="row">
											<div class="col-xl-10 col-md-6 col-sm-12 mb-2">
												<label for="credit-card">Select Page</label>
												<select name="menu1" onChange="MM_jumpMenu('parent',this,0)" class="form-control credit-card-mask">
													<option value="" selected="selected" class="form-control">Select</option>

													<option value="manage-pages.php?type=aboutus">About Us</option>
													<option value="manage-pages.php?type=donor">Why Become Donor</option>
												</select>
											</div>

											<div class="col-xl-4 col-md-6 col-sm-12 mb-2">
												<label for="phone-number">Selected Page</label>
												<div class="input-group input-group-merge">
													<?php

													switch ($_GET['type']) {											
														case "donor":
															echo "Why Become Donor";
															break;

														case "aboutus":
															echo "About US";
															break;

														default:
															echo "";
															break;
													}

													?>
												</div>
											</div>
											<div class="col-xl-10 col-md-6 col-sm-12 mb-2">
												<label for="phone-number">Page Details</label>
												<div class="input-group input-group-merge">
													<textarea class="form-control phone-number-mask" name="pgedetails" rows="10">
													<?php
													$pagetype = $_GET['type'];

													$sql = "SELECT detail from pages where type = :pagetype";

													$query = $conn->prepare($sql);

													$query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);

													$query->execute();

													$results = $query->fetchAll(PDO::FETCH_OBJ);
													$cnt = 1;
													if ($query->rowCount() > 0) {
														foreach ($results as $result) {
															echo strip_tags($result->detail);
														}
													}
													?>
													</textarea>

												</div>
											</div>

											<div class="col-xl-10 col-md-6 col-sm-12 mb-2">
												<button class="btn btn-primary" type="submit" name="submit" id="submit">Save changes</button>
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