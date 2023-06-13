<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="signinstyle.css">
</head>

<body>

    <div class="container">
        <div class="text-center mb-3">
        <img src="https://freevector.co/wp-content/uploads/2010/05/36962-plus-sign-in-a-circle.png" 
        alt="" width="200" height="200">
        </div>
        <h3 class="text-center mb-3">ยินดีต้อนรับ</h3>
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <form action="signin_db.php" method="post">
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
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" aria-describedby="email" placeholder="name@example.com">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <label for="password" class="form-label">Password</label>

                    </div>
                    <button type="submit" name="signin" class="btn btn-primary">Sign In</button>
                </form>
                <hr>
                <p>ยังไม่เป็นสมาชิกใช่ไหม คลิ๊กที่นี่เพื่อ <a href="index.php">สมัครสมาชิก</a></p>
            </div>
        </div>
    </div>
</body>

</html>