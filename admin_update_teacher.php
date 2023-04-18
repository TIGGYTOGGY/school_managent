<?php
session_start();
error_reporting(0);

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

if($_GET['teacher_id']){
    $t_id=$_GET['teacher_id'];

    $sql="SELECT * FROM teachers WHERE id='$t_id'";

    $result=mysqli_query($data,$sql);

    $info=$result->fetch_assoc();
}

if(isset($_POST['update_teacher'])){
    $id = $_POST['id'];
    $tname = $_POST['name'];
    $tdesc = $_POST['description'];
    $file = $_FILES['image']['name'];
    $dst="./images/".$file;

    $dst_db="images/".$file;

    move_uploaded_file($_FILES['image']['name'],$dst);

    $sql2= "UPDATE teachers SET name= '$tname',description='$tdesc',image='$dst_db' WHERE id='$id'";


    if($file){
        $sql2= "UPDATE teachers SET name= '$tname',description='$tdesc',image='$dst_db' WHERE id='$id'";

    }else{
        $sql2= "UPDATE teachers SET name= '$tname',description='$tdesc' WHERE id='$id'";
    }

   
    $result2=mysqli_query($data,$sql2);

    if($result2){
        header("location:admin_view_teacher.php");
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
        .divdsn {
            width: 400px;
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
            <div class="divdsn">

                <h1>Update Teacher Data</h1>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="text" name="id" value="<?php echo "{$info['id']}";?>" hidden>
                    <div>
                        <label>Teacher Name:</label>
                        <input type="text" name="name" id="" value="<?php echo "{$info['name']}";?>">
                    </div>
                    <br>
                    <div>
                        <label>About teacher:</label>
                        <textarea name="description" rows="4"><?php echo "{$info['description']}";?></textarea>
                    </div>
                    <br>
                    <div>
                        <label>Teacher Image:</label>
                        <img height="100px" width="100px" src="<?php echo "{$info['image']}";?>">
                    </div>
                    <div>
                        <label>New Image:</label>
                        <input type="file" name="image" id="">
                    </div>
                    <br>
                    <div>
                        <input type="submit" name="update_teacher" id="" value="Update teacher" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </center>


    </div>

</body>

</html>