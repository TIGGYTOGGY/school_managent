<?php
error_reporting(0);
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

$sql = "SELECT * FROM teachers";

$result = mysqli_query($data, $sql);

if($_GET['teacher_id']){
    $t_id=$_GET['teacher_id'];

    $sql2="DELETE FROM teachers WHERE id='$t_id'";

    $result2=mysqli_query($data,$sql2 );

    if($result2){
        header('location:admin_view_teacher.php');
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
        .th {
            padding: 20px;
            font-size: 20px;
        }

        .td {
            padding: 20px;
            background-color: skyblue;

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
            <h1>View All Teacher Data</h1>

            <table border="1px">
                <tr>
                    <th class="th">Teacher Name</th>
                    <th class="th">About Teacher</th>
                    <th class="th">Image</th>
                    <th class="th">Delete</th>
                    <th class="th">Update</th>
                </tr>

                <?php
                  while ($info = $result->fetch_assoc()) {
                ?>

                <tr>
                    <td class="td"><?php echo "{$info['name']}";?></td>
                    <td class="td"><?php echo "{$info['description']}";?></td>
                    <td class="td"><img height="100px" width="100px" src="<?php echo "{$info['image']}";?>"></td>
                    <td class="td">
                        <?php
                        echo "
                        <a onclick= \" javascript:return confirm('Are you sure to delete this'); \" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}' >Delete</a>";
                        ?>
                    </td>
                    <td class="td">
                        <?php
                        echo "
                        <a class='btn btn-primary' href='admin_update_teacher.php?teacher_id={$info['id']}'>Update</a>";
                        ?>
                    </td>
                </tr>

                <?php
            }
            ?>
            </table>
        </center>


    </div>

</body>

</html>