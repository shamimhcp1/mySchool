<?php
/**
 * Created by PhpStorm.
 * User: Shamim
 * Date: 11/8/2018
 * Time: 3:20 PM
 */

session_start();
if(isset($_SESSION['id'])) {
    header('Location: view-student.php');
}

require_once './vendor/autoload.php';
use App\classes\Register;

$success='';
if(isset($_POST['register'])) {
    $login = new Register();
    $success = $login->userRegister();
}


?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>mySchool by Shamim Hossain</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">

                <div class="login-form">
                    <div class="login-logo">
                        <a href="index.php">
                            <img class="align-content" src="images/school-logo.jpg" alt="">
                        </a>
                    </div>
                    <div class="form-group">
                        <label class="text-success"><?php echo $success; ?></label>
                    </div>
                    <div class="form-group">
                        <label class="text-success font-weight-bold">To create an account, please fill up the form below..!</label>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required>
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="yourmail@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="number" name="mobile" class="form-control" placeholder="018123456789" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <div>
                                <input type="radio" name="role" value="teacher" checked> Teacher
                                <input type="radio" name="role" value="student"> Student
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div>
                                <input type="radio" name="gender" value="male" checked> Male
                                <input type="radio" name="gender" value="female"> Female
                            </div>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>

                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="login.php"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
