<?php
// เชื่อมต่อฐานข้อมูล
require('connect.php');

// รับค่าที่ส่งมาจากฟอร์มลงในตัวแปร
$ac_name = $_POST["ac_name"];
$details = $_POST["details"];

// บันทึกข้อมูล
$sql = "INSERT INTO activitys(ac_name,details) VALUES('$ac_name','$details')";
$result = mysqli_query($conn, $sql); // สั่งรันคำสั่ง sql

if ($result) {
    echo
    "<script>
    alert('บันทึกสำเร็จ');
    document.location.href = 'home.php';
    </script>
    ";
    // header("location:home.php");
    exit(0);
} else {
}
