<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['teacher_login'])) {
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
    <title>teacher Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container-fluid">

            <?php
            if (isset($_SESSION['teacher_login'])) {
                $teacher_id = $_SESSION['teacher_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $teacher_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            ?>
            <!-- <h3 class="mt-4">Welcome teacher, <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h3>
            <a href="logout.php" class="btn btn-danger">Logout</a> -->


            <a class="navbar-brand" href="teacher.php">
                <img src="https://img2.freepng.es/20180331/deq/kisspng-computer-icons-hospital-medicine-symbol-pharmacy-5ac0104c00db89.4928109315225365240035.jpg" 
                alt="" width="35" height="35" class="d-inline-block align-text-top">
                สูติศาสตร์-นรีเวชวิทยา(ครู)
            </a>
            <!-- <h3 class="mt-4">Welcome, <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h3> -->





            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="หน้ารายวิชา.php">หน้ารายวิชา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">หน้าตาราง</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">หน้าประเมิน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">จัดการ</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="text-center">หลักสูตรของเรา</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://adces.unistra.fr/wp-content/uploads/2019/11/Ic%C3%B4ne-accompagner-l%C3%A9tablissement.png" class="card-img-top" alt="..." height="400" width="400">
                    <div class="card-body">
                        <h5 class="card-title text-center">นักศึกษาชั้นปีที่ 601</h5>
                        <a href="#" class="btn btn-primary container">ดูเพิ่มเติม</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://adces.unistra.fr/wp-content/uploads/2019/11/Ic%C3%B4ne-accompagner-l%C3%A9tablissement.png" class="card-img-top" alt="..." height="400" width="400">
                    <div class="card-body">
                        <h5 class="card-title text-center">นักศึกษาชั้นปีที่ 602</h5>
                        <a href="#" class="btn btn-primary container">ดูเพิ่มเติม</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://adces.unistra.fr/wp-content/uploads/2019/11/Ic%C3%B4ne-accompagner-l%C3%A9tablissement.png" class="card-img-top" alt="..." height="400" width="400">
                    <div class="card-body">
                        <h5 class="card-title text-center">นักศึกษาชั้นปีที่ 603</h5>
                        <a href="#" class="btn btn-primary container">ดูเพิ่มเติม</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>