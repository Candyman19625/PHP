<?php 
session_start();
if ($_SESSION['Userlevel'] != 'A') {  //check session

    Header("Location: logout.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form
}
require("connect.php");
$id=$_GET["id"];

$sql="SELECT * FROM activitys WHERE id = $id";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มแก้ไขข้อมูล</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <h2 class="text-center">แบบฟอร์มแก้ไขข้อมูล</h2>
        <form action="update_activity.php" method="POST">
            <input type="hidden" value="<?php echo $row["id"];?>" name="id">
            <div class="form-group">
                <label for="firstname">ชื่อ</label>
                <input type="text" name="ac_name" id="" class="form-control" value="<?php echo $row["ac_name"];?>">
            </div>
            <div class="form-group">
                <label for="lastname">นามสกุล</label>
                <textarea class="form-control" name="details"><?php echo $row["details"]?></textarea>
                <!-- <input type="text" name="details" id="" class="form-control" value="<?php echo $row["details"]?>"> -->
            </div>
            <input type="submit" value="อัปเดตข้อมูล" class="btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
            <a href="index.php" class="btn btn-primary">กลับหน้าแรก</a>
        </form>
    </div>
</body>

</html>