<?php
/**
 * Created by PhpStorm.
 * User: Shamim
 * Date: 11/8/2018
 * Time: 4:53 PM
 */

namespace App\classes;


class Profile
{
    public function viewProfile($id) {
        extract($_POST);
        $link = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "SELECT * FROM users WHERE id='$id'";
        if ($queryResult = mysqli_query($link, $sql)) {
            return $queryResult;
        } else {
            die("Qurey Problem ".mysqli_error($link));
        }
    }

    public function updateProfile() {
        extract($_POST);
        $md5Password = md5($password);
        $link = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "UPDATE users SET name = '$name', email = '$email', password = '$md5Password', mobile = '$mobile' WHERE id='$id'";
        if (mysqli_query($link, $sql)) {
            return "Info updated successfully!";
        } else {
            die("Qurey Problem ".mysqli_error($link));
        }
    }

}