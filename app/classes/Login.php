<?php
/**
 * Created by PhpStorm.
 * User: Shamim
 * Date: 11/8/2018
 * Time: 1:47 PM
 */

namespace App\classes;


class Login
{
    public function userLogin() {
        extract($_POST);
        $md5Password = md5($password);
        $link = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "SELECT * FROM users WHERE email = '$email' && password = '$md5Password' && role ='$role'";
        if($queryResult = mysqli_query($link, $sql)) {
            $match = mysqli_fetch_assoc($queryResult);
            if($match) {
                session_start();
                $_SESSION['id'] = $match['id'];
                $_SESSION['name'] = $match['name'];
                if($match['role']== 'admin') {
                    header('Location: view-student.php');
                } if($match['role']=='student') {
                    header('Location: profile.php');
                } if($match['role']=='teacher') {
                    header('Location: view-student.php');
                }
            } else {
                return "Credentials didn't match!";
            }
        } else {
            die("Query Problem ".mysqli_error($link));
        }
    }
}