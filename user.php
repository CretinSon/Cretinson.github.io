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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
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
    <!-- content down here-->
    <!-- <h1 class="display-1 text-center">Welcome</h1> -->
    <!-- <img src="" class="img-fluid" alt="..."> -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="http://obgyn.pmk.ac.th/images/DEN%2066%20copy.jpg" class="d-block w-100" alt="..." width="" height="700px">
            </div>
            <div class="carousel-item">
                <img src="http://obgyn.pmk.ac.th/images/D1.jpg" class="d-block w-100" alt="..." height="700px">
            </div>
            <div class="carousel-item">
                <img src="http://obgyn.pmk.ac.th/images/D3.jpg" class="d-block w-100" alt="..." height="700px">
            </div>
            <div class="carousel-item">
                <img src="http://obgyn.pmk.ac.th/templates/a4joomla-dealer-free/images/sampledata/pada411.jpg" class="d-block w-100" alt="..." height="700px"> 
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- info -->
    <hr>
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