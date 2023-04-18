<?php
error_reporting(0);
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

$sql = "SELECT * FROM user WHERE usertype= 'student' ";

$result = mysqli_query($data, $sql);

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
            background: skyblue;
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
            <h1>Student Data</h1>

            <?php
           if($_SESSION['message']){
            echo $_SESSION['message'];
           }

           unset($_SESSION['message']);
            ?>
            <br>

            <table border="1px">
                <tr>
                    <th class="th">Username</th>
                    <th class="th">Email</th>
                    <th class="th">Phone</th>
                    <th class="th">Password</th>
                    <th class="th">Delete</th>
                    <th class="th">Update</th>
                </tr>

                <?php

                while ($info = $result->fetch_assoc()) {

                    ?>

                    <tr>
                        <td class="td">
                            <?php
                            echo "{$info['username']}";
                            ?>
                        </td>
                        <td class="td">
                            <?php
                            echo "{$info['email']}";
                            ?>
                        </td>
                        <td class="td">
                            <?php
                            echo "{$info['phone']}";
                            ?>
                        </td>
                        <td class="td">
                            <?php
                            echo "{$info['password']}";
                            ?>
                        </td>
                        <td class="td">
                            <?php
                            echo " <a onclick= \" javascript:return confirm('Are you sure to delete this'); \" class='btn btn-danger' href='delete.php?student_id={$info['id']}'> Delete </a> ";
                            ?>
                        </td>

                        <td class="td">
                            <?php
                            echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a> ";
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