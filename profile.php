<?php
/**
 * Created by PhpStorm.
 * User: Shamim
 * Date: 11/8/2018
 * Time: 4:46 PM
 */

session_start();
if($_SESSION['id']== null) {
    header('Location: login.php');
}

require_once './vendor/autoload.php';
use App\classes\Profile;
use App\classes\Logout;

$profile = new \App\classes\Profile();
$queryResult = $profile->viewProfile($_SESSION['id']);
$data = mysqli_fetch_assoc($queryResult);

$logout = new Logout();
if(isset($_GET['logout'])) {
    $logout->userLogout();
}

$msg='';
if(isset($_POST['updateProfile'])) {
    $msg = $profile->updateProfile();
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

        <div class="text-center bg-danger p-4 text-white">
            <h2><?php echo $_SESSION['name'] ?></h2>
        </div>


        <div class="card bg-light">

                <form action="" method="post" class="form-horizontal">

                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Role</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="form-control"><?php echo $data['role']; ?></div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" name="password" value="<?php echo $data['password']; ?>" class="form-control">
                                <span>Password unchanged!</span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Gender</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="form-control"><?php echo $data['gender']; ?></div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Mobile</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" name="mobile" class="form-control" value="<?php echo $data['mobile']; ?>">
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" name="updateProfile" class="btn btn-danger btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Update Profile
                        </button>  <span class="text-success"><?php echo $msg; ?></h2></span>
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