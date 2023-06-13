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
    <!-- info here -->
    <?php
    $db = new mysqli('localhost', 'root', '');
    $student = 'YourStudent';
    ///////////////////////////////////////////////////////////////////////////////////////////
    //   day config
    $day_config = array(
        'mon' => array('yellow', 'จันทร์', 1),
        'tue' => array('pink', 'อังคาร', 2),
        'wed' => array('green', 'พุธ', 3),
        'thu' => array('orange', 'พฤหัสบดี', 4),
        'fri' => array('skyblue', 'ศุกร์', 5),
        'sat' => array('violet', 'เสาร์', 6),
        'sun' => array('red', 'อาทิตย์', 7),
    );
    $day_week = array('', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun');
    //////////////////////////////////////////////////////////////////////////////////////////
    //  สวน statement สำหรับ ใช้กับ database จริง
    /*
$sql = "select *, left( book_time_b, 2) st, left( book_time_e, 2) en 
from table where Name_surname = '$student' 
order by field(book_date_b,'mon','tue','wed','thu','fri','sat','sun'), book_time_b";
/*/
    //////////////////////////////////////////////////////////////////////////////////////////
    //   ส่วน statement สำหรับ ทดสอบ
    $sql = "select * from (
	select 102 id_type_room, 'HNSS01' sub_code, 'wed' book_date_b, 9 st, 10 en union all
	select 111 , 'HNSS01' , 'tue' , 9 , 18 union all
	select 145 , 'HNSS01' , 'tue' , 19 , 21 union all
	select 123 , 'HNSS01' , 'wed' , 11 , 12 union all
	select 124 , 'HNSS01' , 'wed' , 13 , 15 union all
	select 122 , 'HNSS01' , 'fri' , 15 , 21 union all
	select 122 , 'HNSS01' , 'sat' , 9 , 10
) tb 
order by field(book_date_b,'mon','tue','wed','thu','fri','sat','sun'), st";
    ////////////////////////////////////////////////////////////////////////////////////////*/
    //  ส่วนการสร้าง tr
    $cur_day = 0;
    $cur_hour = '';
    $tr = '';
    $rs = $db->query($sql) or die($sql . "<br>" . $db->error);
    while ($ro = $rs->fetch_assoc()) {
        $d = $ro['book_date_b'];
        $w = $day_config[$d][2];
        $st = intval($ro['st']);
        $en = intval($ro['en']);
        if ($w != $cur_day) { // ตรวจสอบว่า เป็นวันใหม่ หรือไม่
            if ($tr) // ถ้า tr มีความยาว แสดงว่าได้ถูกใส่ <TR> เปิดไว้ก่อนแล้ว ให้ ใส่ </TR>
                $tr .= ($cur_hour < 21 ? '<td colspan=' . (21 - $cur_hour) . " >&nbsp;</td>" : '') . '</tr>';
            $cur_day++;  //  วันที่เก่า +1
            for ($cur_day; $cur_day < $w; $cur_day++) {
                // ตรวจสอบวันที่เก่า กับวันที่ ใหม่ มี gab ช่่องว่างวันที่ ไม่มีชั่วโมงเรียนหรือไม่ 
                // โดยวนลูป วันที่เก่า ถึง วันที่ใหม่ แล้วแสดง บันทัดของวันที่ว่างนั้น
                $tr .= '<tr height=55 >' .
                    '<td align=center bgcolor="' . $day_config[$day_week[$cur_day]][0] . '" >' . $day_config[$day_week[$cur_day]][1] . '</td>' .
                    '<td colspan=13>&nbsp;</td></tr>';
            }
            $cur_hour = 9; // เปลี่ยน ชั่วโมง เริ่มต้น
            $tr .= '<tr height=55 ><td align=center bgcolor="' . $day_config[$d][0] . '" >' . $day_config[$d][1] . '</td>';
        }
        if ($cur_hour < $st) // ตรวจสอบ gab ชั่วโมงเริ่มต้น กับชั่วโมงปัจจุบันเพื่อนสร้าง td ชั่วโมงที่ว่าง
            $tr .= '<td align=center colspan=' . ($st - $cur_hour) . " >&nbsp;</td>";
        $cur_hour = $en; // เปลี่ยน ชั่วโมง เริ่มต้น เป็น เวลาสิ้นสุดการเรียน
        //  แสดงเวลาเรียน
        $tr .= '<td align=center ' . (($h = $en - $st) > 1 ? "colspan=$h" : '') . ' >' . $ro['id_type_room'] . '<br>' . $ro['sub_code'] . '</td>';
    }
    if ($cur_hour < 21) // ตรวจสอบ ชั่งโมงเรียนสุดท้าย น้อยกว่าเวลาปิดการสอน  21 น. หรือไม่ แล้วแสดง td ช่วงเวลาที่หายไป
        $tr .= '<td colspan=' . (21 - $cur_hour) . " >&nbsp;</td>";
    $tr .= '</tr>'; // ปิด TR 
    $cur_day++;
    for ($cur_day; $cur_day < 8; $cur_day++) {
        //ตรวจวัน ที่หายไป จาก วันที่เรียนวันสุดท้าย แล้วแสดง tr วันที่หายไป
        $tr .= '<tr height=55 ><td align=center bgcolor="' . $day_config[$day_week[$cur_day]][0] . '" >' . $day_config[$day_week[$cur_day]][1] . '</td>' .
            '<td colspan=13>&nbsp;</td></tr>';
    }
    ///////////////////////////////////////////////////////////////////////////////l
    // ส่วน แสดงตารางเรียน
    ?>
    <table border=1>
        <tr>
            <th width=80 align=center>วัน \ เวลา</th>
            <th width=80 align=center>09:00 - 10:00</th>
            <th width=80 align=center>10:00 - 11:00</th>
            <th width=80 align=center>11:00 - 12:00</th>
            <th width=80 align=center>12:00 - 13:00</th>
            <th width=80 align=center>13:00 - 14:00</th>
            <th width=80 align=center>14:00 - 15:00</th>
            <th width=80 align=center>15:00 - 16:00</th>
            <th width=80 align=center>16:00 - 17:00</th>
            <th width=80 align=center>17:00 - 18:00</th>
            <th width=80 align=center>18:00 - 19:00</th>
            <th width=80 align=center>19:00 - 20:00</th>
            <th width=80 align=center>20:00 - 21:00</th>
        </tr>
        <?= $tr ?>
    </table>

</body>

</html>