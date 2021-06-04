<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BloodBank | About && Become Doner</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="assets/css/modern-business.css" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <style>
        .navbar-toggler {
            z-index: 1;
        }

        @media (max-width: 576px) {
            nav>.container {
                width: 100%;
            }
        }
    </style>

</head>

<body>


    <?php include('includes/header.php'); ?>
    <!-- Page Content -->
    <div class="container">
        <?php
        $type = $_GET['type'];
        $sql = "SELECT type, detail, name from pages where type = :type";
        $query = $conn->prepare($sql);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>
                <h1 class="mt-4 mb-3"><?= $result->name ?> </h1>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php" style="color: #d2403f">Home</a>
                    </li>
                    <li class="breadcrumb-item active"><?= $result->name ?></li>
                </ol>

                <p style="    width:85%;
    text-align: center;
    margin: auto;
    margin-top: 50px;
    margin-bottom: 20px;
    line-height: 2;
    height: 340px;"><?= $result->detail ?> </p>

    </div>
    <!-- /.container -->
<?php }
        } ?>

<!-- Footer -->
<?php include('includes/footer.php'); ?>

<!-- Bootstrap core JavaScript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/tether/tether.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>