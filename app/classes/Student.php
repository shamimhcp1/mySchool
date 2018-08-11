<?php
/**
 * Created by PhpStorm.
 * User: Shamim
 * Date: 9/8/2018
 * Time: 6:00 PM
 */

namespace App\classes;


class Student
{
    public function addStudent() {
        extract($_POST);
        $link = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "INSERT INTO students (name, email, mobile) VALUES ('$name', '$email', '$mobile')";
        if (mysqli_query($link, $sql)) {
            return "Add Student Info Success";
        } else {
            die("Qurey Problem ".mysqli_error($link));
        }
    }

    public function viewStudent() {
        extract($_POST);
        $link = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "SELECT * FROM students";
        if ($queryResult = mysqli_query($link, $sql)) {
            return $queryResult;
        } else {
            die("Qurey Problem ".mysqli_error($link));
        }
    }

    public function editStudent($id) {
        extract($_POST);
        $link = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "SELECT * FROM students where id='$id'";
        if ($queryResult = mysqli_query($link, $sql)) {
            return $queryResult;
        } else {
            die("Qurey Problem ".mysqli_error($link));
        }
    }

    public function updateStudent() {
        extract($_POST);
        $link = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "UPDATE students SET name = '$name', email = '$email', mobile = '$mobile' WHERE id='$id'";
        if (mysqli_query($link, $sql)) {
            header('Location: view-student.php');
        } else {
            die("Qurey Problem ".mysqli_error($link));
        }
    }

    public function deleteStudent($id) {
        extract($_POST);
        $link = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "DELETE FROM students WHERE id='$id'";
        if (mysqli_query($link, $sql)) {
            header('Location: view-student.php');
        } else {
            die("Qurey Problem ".mysqli_error($link));
        }
    }

    public function searchStudent() {
        extract($_POST);
        $link = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "SELECT * FROM students WHERE name LIKE '%$search_text%' || email LIKE '%$search_text%' || mobile LIKE '%$search_text%'";
        if ($queryResult = mysqli_query($link, $sql)) {
            return $queryResult;
        } else {
            die("Qurey Problem ".mysqli_error($link));
        }
    }


}