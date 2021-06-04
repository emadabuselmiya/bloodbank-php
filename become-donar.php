<?php
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blodgroup = $_POST['bloodgroup'];
    $address = $_POST['address'];
    $message = $_POST['message'];
    $status = 1;
    $sql = "INSERT INTO  blooddonar(fullname, phone, email, age, gender, bloodgroup, address, message, status) VALUES(:fullname, :phone, :email, :age, :gender, :blodgroup, :address, :message, :status)";
    $query = $conn->prepare($sql);
    $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BloodBank | Become A Donar</title>
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
        <h1 class="mt-4 mb-3">Become a <small>Donor</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php" style="color: #d2403f">Home</a>
            </li>
            <li class="breadcrumb-item active">Become a Donor</li>
        </ol>
        <?php if ($error) { ?><div class="errorWrap"><strong style="color: red;">ERROR</strong>:<?= $error ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong style="color: #5cb85c;">SUCCESS</strong>:<?= $msg; ?> </div><?php } ?>
        <!-- Content Row -->
        <form name="donar" method="post">
            <div class="row">
                <div class="col-lg-6 mb-6">
                    <div class="font-bold" style="margin-bottom: 10px;margin-top: 10px;">Full Name</div>
                    <div><input type="text" name="fullname" class="form-control" required></div>
                </div>
                <div class="col-lg-6 mb-6">
                    <div class="font-bold" style="margin-bottom: 10px;margin-top: 10px;">Phone No</div>
                    <div><input type="text" name="phone" class="form-control" required></div>
                </div>
                <div class="col-lg-6 mb-6">
                    <div class="font-bold" style="margin-bottom: 10px;margin-top: 10px;">Email</div>
                    <div><input type="email" name="email" class="form-control"></div>
                </div>
                <div class="col-lg-6 mb-6">
                    <div class="font-bold" style="margin-bottom: 10px;margin-top: 10px;">Age</div>
                    <div><input type="text" name="age" class="form-control" required></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-6">
                    <div class="font-bold" style="margin-bottom: 10px;margin-top: 10px;">Gender</div>
                    <div><select name="gender" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-6 mb-6">
                    <div class="font-bold" style="margin-bottom: 10px;margin-top: 10px;">Blood Group</div>
                    <div><select name="bloodgroup" class="form-control" required>
                            <?php $sql = "SELECT * from  bloodgroup ";
                            $query = $conn->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {               ?>
                                    <option value="<?= $result->name; ?>"><?= $result->name; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12 mb-12">
                    <div class="font-bold" style="margin-bottom: 10px;margin-top: 10px;">Address</div>
                    <div><textarea class="form-control" name="address"></textarea></div>
                </div>

                <div class="col-lg-12 mb-12">
                    <div class="font-bold" style="margin-bottom: 10px;margin-top: 10px;">Message</div>
                    <div><textarea class="form-control" name="message" required> </textarea></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-4" style="text-align: center;">
                    <div><input type="submit" name="submit" class="btn btn-danger" value="submit" style="cursor:pointer;width:30%;margin-top: 25px;"></div>
                </div>



            </div>



            <!-- /.row -->
        </form>
        <!-- /.row -->
    </div>
    <?php include('includes/footer.php'); ?>
    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/tether/tether.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>