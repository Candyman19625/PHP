<?php 
require('connect.php');

$id=$_GET["idemp"];

$sql="UPDATE activitys SET status = 0 WHERE id =$id";

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

?>