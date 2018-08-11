<?php
/**
 * Created by PhpStorm.
 * User: Shamim
 * Date: 11/8/2018
 * Time: 2:15 PM
 */

namespace App\classes;


class Logout
{
    public function userLogout() {
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header('Location: index.php');
    }
}