<?php
/**
 * Created by PhpStorm.
 * User: Shamim
 * Date: 9/8/2018
 * Time: 5:58 PM
 */
session_start();
if($_SESSION['id']== null) {
    header('Location: login.php');
}

require_once './vendor/autoload.php';
use App\classes\Student;
use App\classes\Logout;

$msg='';
if(isset($_POST['btn'])) {
    $student = new Student();
    $msg = $student->addStudent();
}

$logout = new Logout();
if(isset($_GET['logout'])) {
    $logout->userLogout();
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
    <!--    <link rel="stylesheet" href="assets/scss/style.css">-->

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>



<body class="bg-warning">


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="index.php">$mySchool</a>

    <!-- Links -->
    <div class="mr-auto">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="add-student.php">Add Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view-student.php">View Student</a>
            </li>
        </ul>
    </div>
    <div class="">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="?logout=true">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php?id=<?php echo $_SESSION['id'] ?>"><?php echo $_SESSION['name'] ?></a>
            </li>
        </ul>
    </div>

</nav>


<div class="container">
    <br/>
    <div class="col-md-5">
        <div class="card bg-secondary text-white">
            <form action="" method="post" class="">
                <div class="card-header">
                    <h2><strong>Add</strong> Student Info</h2>
                </div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label class=" form-control-label">Name</label>
                        <input type="text" name="name" placeholder="Your Full Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Email</label>
                        <input type="email" name="email" placeholder="Enter Email.." class="form-control">
                    </div>
                    <div class="form-group"><label class=" form-control-label">Mobile</label>
                        <input type="number" name="mobile" placeholder="Enter Mobie Number.." class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="btn" class="btn btn-dark btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>  <span class="text-white"><?php echo $msg; ?></span>
                </div>
            </form>
        </div>
    </div>

</div>






<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

</body>