<?php

error_reporting(0);
session_start();
session_destroy();

if ($_SESSION['message']) {
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}

$host = "localhost";
$user = "root";
$password = "";
$db = "school project";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM teachers";

$result = mysqli_query($data, $sql);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <label class="logo">MGA SCHOOL</label>
        <ul>
            <!-- <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admisssion</a></li> -->
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <label class="txtimg">We handle students with care</label>
        <img class="main-img" src="images/school_management.jpg" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome" src="images/school2.jpg" alt="">
            </div>
            <div class="col-md-8">
                <h1>Welcome to MGA School</h1>
                <p>MGA School is a prestigious educational institution located in the heart of a bustling city. The
                    school boasts a beautiful campus with modern facilities and state-of-the-art classrooms that are
                    fully equipped with the latest technology to support learning.MGA School has a team of highly
                    qualified and experienced teachers who are passionate about teaching and dedicated to providing the
                    best possible education to their students. The school offers a wide range of academic programs,
                    including science, arts, and commerce streams, to cater to the diverse interests and aspirations of
                    students.</p>

            </div>
        </div>
    </div>

    <center>
        <h1>Our Teachers</h1>
    </center>

    <div class="container">
        <div class="row">

            <?php
            while ($info = $result->fetch_assoc()) {
                ?>


                <div class="col-md-4">
                    <img height="150px" width="250px" src="<?php echo "{$info['image']}"; ?>">
                    <h3>
                        <?php
                        echo "{$info['name']}"
                            ?>
                    </h3>
                    <h3>
                        <?php
                        echo "{$info['description']}"
                            ?>
                    </h3>
                </div>
                <?php
            }
            ?>
            <!-- <div class="col-md-4">
                <img src="images/teacher2.jpg" alt="" class="teacher">
                <p>I am excited to be your teacher.I have been trained on a vast array of topics and have extensive
                    knowledge in various fields. My goal is to help you learn and understand complex concepts in an
                    engaging and interactive way.</p>

            </div>
            <div class="col-md-4">
                <img src="images/teacher3.jpg" alt="" class="teacher">
                <p>I am excited to be your teacher.I have been trained on a vast array of topics and have extensive
                    knowledge in various fields. My goal is to help you learn and understand complex concepts in an
                    engaging and interactive way.</p>

            </div> -->
        </div>
    </div>


    <center>
        <h1>Our Courses</h1>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="images/web.jpg" alt="" class="teacher">
                <h3>Web Development</h3>
            </div>
            <div class="col-md-4">
                <img src="images/graphic.jpg" alt="" class="teacher">
                <h3>Graphics Design</h3>

            </div>
            <div class="col-md-4">
                <img src="images/marketing.png" alt="" class="teacher">
                <h3>Marketing</h3>
            </div>
        </div>
    </div>

    <center>
        <h1>Admission Form</h1>
    </center>
    <div class="admform" align="center">
        <form action="data_check.php" method="POST">
            <div class="adm">
                <label class="label_txt">Name</label>
                <input class="input" type="text" name="name" id="" required>
            </div>
            <div class="adm">
                <label class="label_txt">Email</label>
                <input class="input" type="text" name="email" id="" required>
            </div>
            <div class="adm">
                <label class="label_txt">Phone</label>
                <input class="input" type="text" name="phone" id="" required>
            </div>
            <div class="adm">
                <label class="label_txt">Message</label>
                <textarea class="txtarea" name="message"></textarea required>
            </div>
            <div class="adm">
                <input class="btn btn-primary" id="submit" value="apply" type="submit" name="apply">
            </div>
        </form>

    </div>





</body>

</html>