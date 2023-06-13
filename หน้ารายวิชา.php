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
                <img src="https://img2.freepng.es/20180331/deq/kisspng-computer-icons-hospital-medicine-symbol-pharmacy-5ac0104c00db89.4928109315225365240035.jpg" alt="" width="35" height="35" class="d-inline-block align-text-top">
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

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Class</th>
                <th scope="col">Heading</th>
                <th scope="col">Heading</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Default</th>
                <td>Cell</td>
                <td>Cell</td>
                <td>
                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold container bg-dark" data-mdb-ripple-color="dark">
                        Edit
                    </button>
                </td>
            </tr>

            <tr class="table-primary">
                <th scope="row">Primary</th>
                <td>Cell</td>
                <td>Cell</td>
                <td>
                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold container bg-dark" data-mdb-ripple-color="dark">
                        Edit
                    </button>
                </td>
            </tr>
            <tr class="table-secondary">
                <th scope="row">Secondary</th>
                <td>Cell</td>
                <td>Cell</td>
                <td>
                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold container bg-dark" data-mdb-ripple-color="dark">
                        Edit
                    </button>
                </td>
            </tr>
            <tr class="table-success">
                <th scope="row">Success</th>
                <td>Cell</td>
                <td>Cell</td>
                <td>
                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold container bg-dark" data-mdb-ripple-color="dark">
                        Edit
                    </button>
                </td>
            </tr>
            <tr class="table-danger">
                <th scope="row">Danger</th>
                <td>Cell</td>
                <td>Cell</td>
                <td>
                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold container bg-dark" data-mdb-ripple-color="dark">
                        Edit
                    </button>
                </td>
            </tr>
            <tr class="table-warning">
                <th scope="row">Warning</th>
                <td>Cell</td>
                <td>Cell</td>
                <td>
                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold container bg-dark" data-mdb-ripple-color="dark">
                        Edit
                    </button>
                </td>
            </tr>
            <tr class="table-info">
                <th scope="row">Info</th>
                <td>Cell</td>
                <td>Cell</td>
                <td>
                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold container bg-dark" data-mdb-ripple-color="dark">
                        Edit
                    </button>
                </td>
            </tr>
            <tr class="table-light">
                <th scope="row">Light</th>
                <td>Cell</td>
                <td>Cell</td>
                <td>
                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold container bg-dark" data-mdb-ripple-color="dark">
                        Edit
                    </button>
                </td>
            </tr>
            <tr class="table-dark">
                <th scope="row">Dark</th>
                <td>Cell</td>
                <td>Cell</td>
                <td>
                    <button type="button" class="btn btn-link btn-rounded btn-sm fw-bold container bg-light" data-mdb-ripple-color="dark">
                        Edit
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>