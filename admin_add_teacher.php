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

if(isset($_POST['add_teacher'])){
    $t_name = $_POST['name'];
    $t_description = $_POST['description'];
    $file = $_FILES['image']['name'];

    $dst="./images/".$file;

    $dst_db="images/".$file;

    move_uploaded_file($_FILES['image']['name'],$dst);

    $sql="INSERT INTO teachers (name,description,image) VALUES('$t_name','$t_description','$dst_db')";

    $result=mysqli_query($data,$sql);

    if($result){
        header('location:admin_add_teacher.php');

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
        .div_dsn {
            width: 500px;
            background-color: skyblue;
            padding-bottom: 70px;
            padding-top: 70px;
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
        <h1>Add teacher</h1>
        <br><br>

        <div class="div_dsn">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Teacher Name:</label>
                    <input type="text" name="name" id="">
                </div>
                <br>
                <div>
                    <label>Description:</label>
                    <textarea name="description"></textarea>
                </div>
                <br>
                <div>
                    <label>Image:</label>
                    <input type="file" name="image" id="">
                </div>
                <br>
                <div>
                    <input type="submit" name="add_teacher" id="" value="Add Teacher" class="btn btn-primary">
                </div>
            </form>

        </div>
        </center>
        

    </div>

</body>

</html>