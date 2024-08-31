<?php
require('connect.php');
$id = $_GET["id"];
$sql = "SELECT * FROM activitys WHERE id = $id ";
$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Multiple Images</title>
</head>

<body>
    <form action="insertimg.php" method="post" enctype="multipart/form-data">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <!-- <input type="hidden" name="ac_id" id="ac_id" value="<?php echo $row["id"] ?>"> -->
            <input type="text" value="<?php echo $row["id"]; ?>" name="id">
        <?php } ?>

        <label for="images">Select images to upload:</label>
        <input type="file" name="images[]" id="images" multiple>
        <input type="submit" value="Upload Images">
    </form>
</body>

</html>