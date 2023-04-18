<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");

}

$host= "localhost";
$user= "root";
$password= "";
$db= "school project";

$data=mysqli_connect($host,$user,$password,$db);

$name=$_SESSION['username'];

$sql="SELECT * FROM user WHERE username= '$name'";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);

if(isset($_POST['update_profile'])){
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql2= "UPDATE user SET email='$email',phone='$phone',password='$password' WHERE username='$name' ";

    $result2=mysqli_query($data,$sql2);

    if($result2){
        header('location:student_profile.php');
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <?php
    include("student_css.php");
    ?>

    <style>
        label{
            display: inline-block;
            text-align: center;
            width:100px;
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
    include("student_sidebar.php");
    ?>
 
    <div class="content">
        <center>
            <h1>Update Profile</h1>
            <br> 
        <form action="#" method="POST">
            <div class="divdsn">
            <!-- <div>
                <label>Name</label>
                <input type="text" name="name" id="" value="<?php echo "{$info['username']}"?>">
            </div> -->
            <div>
                <label>Email</label>
                <input type="text" name="email" id="" value="<?php echo "{$info['email']}"?>">
            </div>
            <div>
                <label>Phone</label>
                <input type="text" name="phone" id="" value="<?php echo "{$info['phone']}"?>">
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="password" id="" value="<?php echo "{$info['password']}"?>">
            </div>
            <div>
                <input type="submit" name="update_profile" id="" class="btn btn-primary" value="Update">
            </div>
            </div>
        </form>
        </center>

    </div>

</body>

</html>