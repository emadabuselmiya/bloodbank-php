<?php
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

    <title>BloodBank</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/modern-business.css" rel="stylesheet">
    <script src="assets/vendor/jquery/script.js"></script>
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
    <script src="assets/vendor/jquery/jquery-1.12.2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#tabs").tabs();
        });
    </script>
    <script src="js/jquery-1.12.2.min.js"></script>
    <style>
        .navbar-toggler {
            z-index: 1;
        }

        .body {
            font-family: 'Cairo', sans-serif;
        }

        @media (max-width: 576px) {
            nav>.container {
                width: 100%;
            }
        }

        .carousel-item.active,
        .carousel-item-next,
        .carousel-item-prev {
            display: block;
        }

        .col-first-section:hover {
            transform: scale(1.1);
            transition: all 1s;
        }

        .card-img-top:hover {
            transform: rotate(360deg);
            transition: all 1s;
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php'); ?>
    <?php include('includes/slider.php'); ?>

    <!-- Page Content -->
    <div class="container" style="text-align: center;">

        <h1 class="my-4">Welcome to BloodBank</h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4 col-first-section">
                <div class="card">
                    <h4 class="card-header">The need for blood</h4>

                    <p class="card-text" style="padding-left:2%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
            <div class="col-lg-4 mb-4 col-first-section">
                <div class="card">
                    <h4 class="card-header">Blood Tips</h4>

                    <p class="card-text" style="padding-left:2%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
            <div class="col-lg-4 mb-4 col-first-section">
                <div class="card">
                    <h4 class="card-header">Who you could Help</h4>

                    <p class="card-text" style="padding-left:2%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
        </div>
        <!-- /.row -->



        <!-- Features Section -->
        <div class="row" style="text-align: left;">
            <div class="col-lg-6">
                <h2 style="color:#d2403f;">BLOOD GROUPS</h2>
                <p> blood group of any human being will mainly fall in any one of the following groups.</p>
                <ul>
                    <li style="list-style: square;">A positive or A negative</li>
                    <li style="list-style: square;">B positive or B negative</li>
                    <li style="list-style: square;">O positive or O negative</li>
                    <li style="list-style: square;">AB positive or AB negative.</li>
                </ul>
                <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="assets/images/image4.jpg" alt="">
            </div>
        </div>
        <!-- /.row -->
        <hr>

        <!-- Portfolio Section -->
        <h2 style="color:#d2403f; margin-top: 50px;">Some of the Donar</h2>

        <div class="row">
            <?php
            $status = 1;
            $sql = "SELECT * from blooddonar where status = :status order by rand() limit 4";
            $query = $conn->prepare($sql);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $result) { ?>

                    <div class="col-lg-3 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top img-fluid" src="assets/images/image3.jpg" alt=""></a>
                            <div class="card-block">
                                <h4 class="card-title"><a href="#" style="color:#e71307;"><?= $result->fullname ?></a></h4>
                                <p class="card-text"><b> Gender :</b> <?= $result->gender ?></p>
                                <p class="card-text"><b>Blood Group :</b> <?= $result->bloodgroup ?></p>

                            </div>
                        </div>
                    </div>

            <?php }
            } ?>





        </div>
        <!-- /.row -->
        <!-- Call to Action Section -->
        <div class="row mb-4" style="text-align: left;">
            <div class="col-md-8">
                <h4>UNIVERSAL DONORS AND RECIPIENTS</h4>
                <p>
                Blood type tests are done before a person gets a blood transfusion and to check a pregnant woman's blood type. Human blood is typed by certain markers (called antigens) on the surface of red blood cells. Blood type tests may also be done to see if two people are likely to be blood relatives.</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-danger btn-block" href="become-donar.php">Become a Donar</a>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/tether/tether.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/owl.carousel.min.js" type="text/javascript"></script>
    <script src="assets/vendor/jquery/script.js"></script>
</body>

</html>