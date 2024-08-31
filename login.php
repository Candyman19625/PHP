<?php
session_start();
if (isset($_POST['Username'])) {
  //connection
  include("connect.php");
  //รับค่า user & password
  $Username = $_POST['Username'];
  $Password = ($_POST['Password']);
  //query 
  $sql = "SELECT * FROM User WHERE Username='" . $Username . "' AND Password='" . $Password . "' ";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_array($result);

    $_SESSION["UserID"] = $row["ID"];
    $_SESSION["User"] = $row["Firstname"] . " " . $row["Lastname"];
    $_SESSION["Userlevel"] = $row["Userlevel"];

    if ($_SESSION["Userlevel"] == "A") { //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
      echo
      "<script>
                        alert('ยินดีต้อนรับ Admin');
                        document.location.href = 'home.php';
                        </script>
                        ";
      // Header("Location: home.php");

    } else if ($_SESSION["Userlevel"] == "M") {  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
      echo
      "<script>
                        alert('Sent Successfully');
                        document.location.href = 'eiei.php';
                        </script>
                        ";
      // Header("Location: eiei.php");

    } else {
      echo "<script>";
      echo "alert(\" Username หรือ  Password ไม่ถูกต้อง\");";
      echo "window.history.back()";
      echo "</script>";
    }
  } else {
    echo "<script>";
    echo "alert(\" Username หรือ  Password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {
  Header("Location: testlogin.php"); //user & password incorrect back to login again
}
