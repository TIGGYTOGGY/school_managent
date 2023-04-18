<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");

}

$host = "localhost";
$user = "root";
$password = "";
$db = "school project";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_student'])) {
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = "student";

    $check= "SELECT * FROM user WHERE username='$user_name'";

    $check_user=mysqli_query($data,$check);

    $row_count=mysqli_num_rows($check_user);

    if($row_count==1){
        echo "<script type= 'text/javascript'>
        alert('Username Already Exist.Input another user');
        </script>";
    }else{

    $sql = "INSERT INTO user(username,email,phone,usertype,password) VALUES ('$user_name','$user_email','$user_phone','$usertype','$user_password')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        echo "<script type= 'text/javascript'>
       alert('Data Upload Success');
       </script>";
    } else {
        echo "upload failed";
    }
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
    <style>
        label {
            display: inline-block;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
            width: 100px;
        }

        .dsn-form {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;

        }
    </style>

    <?php

    include("admin_css.php");

    ?>
</head>

<body>

    <?php

    include("admin_sidebar.php");

    ?>
    <div class="content">
        <center>
            <h1>Add student</h1>
            <div class="dsn-form">
                <form action="add_student.php" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="text" name="name" id="" required>
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" id="" required>
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="tel" name="phone" id="" required>
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="text" name="password" id="" required>
                    </div>
                    <div>
                        <input type="submit" name="add_student" id="" value="Add Student">
                    </div>
                </form>
            </div>
        </center>

    </div>

</body>

</html>