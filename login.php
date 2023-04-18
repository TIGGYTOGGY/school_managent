<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
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

    <style>
        .formdsn {
            padding-top: 200px;
        }

        .label {
            display: inline-block;
            color: rgba(0, 0, 0, 0.836);
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .form-login{
            background:rgb(152, 152, 238);
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
        .title{
            background: skyblue;
            color: white;
            text-align: center;
            font-weight: bold;
            width: 400px;
            font-size: 32px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .body{
            /* background-size: cover;
            background-position: center; */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>

</head>

<body background="images/school2.jpg" class="body">
    <center>
        <div class="formdsn">
            <center class="title">
                Login Form
                <h4>
                    <?php

                    error_reporting(0);

                    session_start();
                    session_destroy();
                    echo $_SESSION['loginMessage'];
                    ?>
                </h4>

            </center>
            <form class="form-login" action="login_check.php" method="POST">
                <div>
                    <label class="label">Username</label>
                    <input type="username" name="username">
                </div>
                <div>
                    <label class="label">Password</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" name="submit" value="login">
                </div>
            </form>
        </div>
    </center>

</body>

</html>