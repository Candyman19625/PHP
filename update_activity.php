<?php 
require("connect.php");

$id=$_POST["id"];

$ac_name=$_POST["ac_name"]; 
$details= $_POST["details"];

$sql ="UPDATE activitys SET ac_name = '$ac_name',details='$details' WHERE id = $id";

$result=mysqli_query($conn,$sql);

if($result){
    echo
    "<script>
    alert('บันทึกสำเร็จ');
    document.location.href = 'home.php';
    </script>
    ";
    exit(0);
}else{
    echo
    "<script>
    alert('เกิดข้อผิดพลาด!');
    document.location.href = 'home.php';
    </script>
    ";
}
$conn = null;
?>