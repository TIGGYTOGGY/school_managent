<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");

}

$host ="localhost";
$user ="root";
$password ="";
$db ="school project";

$data =mysqli_connect($host,$user,$password,$db);

$id=$_GET['student_id'];

$sql="SELECT * FROM user WHERE id='$id' ";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query= "UPDATE user SET username= '$name',email='$email',phone='$phone',password='$password' WHERE id='$id' ";

    $result2=mysqli_query($data,$query);

    if($result2){
        header("location:view_student.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <?php

    include("admin_css.php");

    ?>

    <style>
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;

        }

        .divdsn {
            width: 400px;
            background-color: skyblue;
            padding-bottom: 70px;
            padding-top: 70px;
        }
    </style>
</head>

<body>

    <?php

    include("admin_sidebar.php");

    ?>
    <div class="content">
        <center>
            <h1>Update Student</h1>
            <div class="divdsn">
                <form action="#" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="text" name="name" id="" value="<?php echo "{$info['username']}";?>">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" id="" value="<?php echo "{$info['email']}";?>">
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="tel" name="phone" id="" value="<?php echo "{$info['phone']}";?>">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" id="" value="<?php echo "{$info['password']}";?>">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" name="update" value="Update">
                    </div>
                </form>
            </div>
        </center>

    </div>

</body>

</html>