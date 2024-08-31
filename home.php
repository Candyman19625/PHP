<?php
session_start();
if ($_SESSION['Userlevel'] != 'A') {  //check session

    Header("Location: logout.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form
}
require('connect.php');

$sql = "SELECT activitys.*,ac_img.ac_image FROM activitys 
LEFT JOIN ac_img ON ac_img.ac_id = activitys.id 
GROUP BY activitys.id";
$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);
$order = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- datatable -->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            จัดการกิจกรรม
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo">เพิ่มกิจกรรม</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <h3 align="center">รายชื่อกิจกรรม</h3>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@mdo">เพิ่มกิจกรรม <i class="fa-solid fa-plus"></i></button>
        <br><br>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>ลำดับที่</th>
                    <th>ชื่อกิจกรรม</th>
                    <th>รายละเอียด</th>
                    <th>รูปภาพ</th>
                    <th>สถานะกิจกรรม</th>
                    <th>จัดการกิจกรรม</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <tr>
                    <td><?php echo $order++; ?></td>
                    <td><?php echo $row["ac_name"]; ?></td>
                    <td><?php echo $row["details"]; ?></td>
                    <td> <img class="image-top" src="<?php echo $row["ac_image"]; ?>" style="width: 80px;"
                            height="80px"></td>
                    <td><?php if ($row["status"]==1) {
                        echo '<span style="color:green";>ผ่านการรับรอง <i class="fa-solid fa-check"></i></span>';
                    }else{
                        echo '<span style="color:red";>ไม่ผ่านการรับรอง <i class="fa-solid fa-x"></i></span>';
                    } ?>
                    </td>
                    <td>
                        <div class=" btn-group" role="group" aria-label="Basic mixed styles example">

                            <a href="uploadimg.php?id=<?php echo $row["id"] ?>" type="button" class="btn btn-success"><i
                                    class="fa-solid fa-file-import"></i></i></a>

                            <a href="edit_activity.php?id=<?php echo $row["id"] ?>" type="button"
                                class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

                            <a href="edit_status.php?idemp=<?php echo $row["id"] ?>" type="button"
                                class="btn btn-danger" onclick="return confirm('คุณต้องการอัพเดทข้อมูลหรือไม่')"><i
                                    class="fa-solid fa-x"></i></a>

                        </div>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="insert_ac.php" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">ชื่อกิจกรรม:</label>
                                    <input type="text" class="form-control" id="ac_name" name="ac_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">รายละเอียด:</label>
                                    <textarea class="form-control" id="" name="details"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-primary">เพิ่มกิจกรรม</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <a class="btn btn-danger" href="logout.php">Log out</strong></a>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/9256d15856.js" crossorigin="anonymous"></script>
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<!-- data table -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript" defer charset="utf8">
</script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        pageLength: 5
    });
});
</script>

</html>