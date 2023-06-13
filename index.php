<?php

session_start();
require_once 'config/db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="signinstyle.css">

</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <h3 class="text-center mb-4">สมัครสมาชิก</h3>
            <div class="col-lg-5">
                <form action="signup_db.php" method="post">
                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['warning'])) { ?>
                        <div class="alert alert-warning" role="alert">
                            <?php
                            echo $_SESSION['warning'];
                            unset($_SESSION['warning']);
                            ?>
                        </div>
                    <?php } ?>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="firstname" aria-describedby="firstname" placeholder="firstname">
                        <label for="firstname" class="form-label">First name</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="lastname" aria-describedby="lastname" placeholder="lastname">
                        <label for="lastname" class="form-label">Last name</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="name@example.com">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" placeholder="password">
                        <label for="password" class="form-label">Password</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="c_password" placeholder="c_password">
                        <label for="confirm password" class="form-label">Confirm Password</label>

                    </div>
                    <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                </form>
                <hr>
                <p>เป็นสมาชิกแล้วใช่ไหม คลิ๊กที่นี่เพื่อ <a href="signin.php">เข้าสู่ระบบ</a></p>
            </div>
        </div>
    </div>
</body>

</html>