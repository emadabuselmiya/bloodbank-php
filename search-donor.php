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

    <title>BloodBank | Search Blood</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/modern-business.css" rel="stylesheet">
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

<body>

    <?php include('includes/header.php'); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Search <small>Donor</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php" style="color: #d2403f">Home</a>
            </li>
            <li class="breadcrumb-item active">Search Donor</li>
        </ol>
        <?php if ($error) { ?><div class="errorWrap"><strong style="color: red;">ERROR</strong>:<?= htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong style="color: green;">SUCCESS</strong>:<?= htmlentities($msg); ?> </div><?php } ?>
        <!-- Content Row -->
        <form name="donar" method="post">
            <div class="row">



                <div class="col-lg-12 mb-12">
                    <div class="font-bold" style="margin-bottom: 10px;margin-top: 10px;">Blood Group</div>
                    <div><select name="bloodgroup" class="form-control" required>
                            <?php $sql = "SELECT * from  bloodgroup ";
                            $query = $conn->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {               ?>
                                    <option value="<?= $result->name ?>"><?= $result->name ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>


                <div class="col-lg-12 mb-12">
                    <div class="font-bold" style="margin-bottom: 10px;margin-top: 10px;">Location </div>
                    <div><textarea class="form-control" name="location"></textarea></div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 mb-12">
                    <div><input type="submit" name="submit" class="btn btn-danger" value="submit" style="cursor:pointer;width:30%;margin-top: 25px;margin-bottom: 118px;"></div>
                </div>
            </div>
            <!-- /.row -->
        </form>

        <div class="row">
            <?php
            if (isset($_POST['submit'])) {
                $status = 1;
                $bloodgroup = $_POST['bloodgroup'];
                $location = $_POST['location'];
                $sql = "SELECT * from blooddonar where (status = :status and bloodgroup = :bloodgroup) ||  (address = :location)";
                $query = $conn->prepare($sql);
                $query->bindParam(':status', $status, PDO::PARAM_STR);
                $query->bindParam(':bloodgroup', $bloodgroup, PDO::PARAM_STR);
                $query->bindParam(':location', $location, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>

                        <div class="col-lg-4 col-sm-6 portfolio-item">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top img-fluid" src="assets/images/blood-donor.jpg" alt=""></a>
                                <div class="card-block">
                                    <h4 class="card-title"><a href="#"><?= $result->fullname ?></a></h4>
                                    <p class="card-text"><b>Mobile No. / Email :</b> <?= $result->phone ?> <?= $result->email ?> </p>
                                    <p class="card-text"><b>Gender :</b> <?= $result->gender ?></p>
                                    <p class="card-text"><b>Age:</b> <?= $result->age ?></p>
                                    <p class="card-text"><b>Blood Group :</b> <?= $result->bloodgroup ?></p>
                                    <p class="card-text"><b>Address :</b> <?= $result->address ?></p>
                                    <p class="card-text"><b>Message :</b> <?= $result->message ?></p>

                                </div>
                            </div>
                        </div>

            <?php }
                } else {
                    echo "No Record Found";
                }
            } ?>





        </div>



    </div>
    <?php include('includes/footer.php'); ?>
    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/tether/tether.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>