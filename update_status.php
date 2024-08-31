
<?php 
require("connect.php");

$id=$_POST["id"];

$fname=$_POST["fname"]; 
$lname= $_POST["lname"];
$gender=$_POST["gender"];

$emskill=implode(",",$_POST["skills"]); // array=> string

$sql ="UPDATE activitys SET status=0  WHERE id = $id";

$result=mysqli_query($connect,$sql);

if($result){
    header("location:index.php");
    exit(0);
}else{
    echo "เกิดข้อผิดพลาดเกิดขึ้น".mysqli_error($connect);
}
?>
