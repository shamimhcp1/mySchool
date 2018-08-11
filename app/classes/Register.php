<?php
/**
 * Created by PhpStorm.
 * User: Shamim
 * Date: 11/8/2018
 * Time: 3:11 PM
 */

namespace App\classes;


class Register
{

    public function userRegister() {
        extract($_POST);
        $md5Password = md5($password);
        $link = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "INSERT INTO users (name, email, password, role, mobile, gender) VALUES ('$name', '$email', '$md5Password', '$role', '$mobile', '$gender')";
        if(mysqli_query($link, $sql)) {
            return "Registration Success! Now Login to your account.";
        } else {
            die("Query Problem ".mysqli_error($link));
        }
    }

}