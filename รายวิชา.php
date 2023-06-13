<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

        <div class="container-fluid">
            <?php

            if (isset($_SESSION['user_login'])) {
                $user_id = $_SESSION['user_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            ?>
            <a class="navbar-brand" href="user.php">
                <img src="https://img2.freepng.es/20180331/deq/kisspng-computer-icons-hospital-medicine-symbol-pharmacy-5ac0104c00db89.4928109315225365240035.jpg" alt="" width="35" height="35" class="d-inline-block align-text-top">
                สูติศาสตร์-นรีเวชวิทยา
            </a>
            <!-- <h3 class="mt-4">Welcome, <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h3> -->





            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="รายวิชา.php">รายวิชา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ตาราง.php">ตารางเรียน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="คู่มือ.php">คู่มือนักศึกษา</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </ul>
            </div>


        </div>


    </nav>
    <hr>
    <hr>
    <hr>

    <div class="row">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="col-md-4">
            <h5 class="card-title">วิชา 1</h5>
            <p class="card-text">ข้อมูลเกี่ยวกับวิชานั้นๆ Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, cumque!</p>
            <a href="#" class="btn btn-primary">เรียนรู้เพิ่มเติม</a>
        </div>
        <div class="col-md-4">
            <h5 class="card-title">วิชา 2</h5>
            <p class="card-text">ข้อมูลเกี่ยวกับวิชานั้นๆ Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, cumque!</p>
            <a href="#" class="btn btn-primary">เรียนรู้เพิ่มเติม</a>
        </div>
        <div class="col-md-4">
            <h5 class="card-title">วิชา 3</h5>
            <p class="card-text">ข้อมูลเกี่ยวกับวิชานั้นๆ Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, cumque!</p>
            <a href="#" class="btn btn-primary">เรียนรู้เพิ่มเติม</a>
        </div>
        <div class="col-md-4">
            <h5 class="card-title">วิชา 4</h5>
            <p class="card-text">ข้อมูลเกี่ยวกับวิชานั้นๆ Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, cumque!</p>
            <a href="#" class="btn btn-primary">เรียนรู้เพิ่มเติม</a>
        </div>
        <div class="col-md-4">
            <h5 class="card-title">วิชา 5</h5>
            <p class="card-text">ข้อมูลเกี่ยวกับวิชานั้นๆ Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, cumque!</p>
            <a href="#" class="btn btn-primary">เรียนรู้เพิ่มเติม</a>
        </div>
    </div>



</body>

</html>