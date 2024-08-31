<?php
require("connect.php");

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the ac_id from the form
    $ac_id = $_POST['id'];  // Assuming 'id' is passed as 'ac_id'

    // Check if files were uploaded
    if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
        $total_files = count($_FILES['images']['name']);

        for ($i = 0; $i < $total_files; $i++) {
            // Generate a unique filename
            $filename = uniqid() . '_' . $_FILES['images']['name'][$i];
            $target = 'images/' . $filename;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $target)) {
                // Prepare and bind the SQL statement
                $stmt = $conn->prepare("INSERT INTO ac_img (ac_image, ac_id) VALUES (?, ?)");
                $stmt->bind_param("si", $target, $ac_id);

                // Execute the query
                if ($stmt->execute()) {
                    echo "<script>
                        alert('บันทึกสำเร็จ');
                        document.location.href = 'home.php';
                        </script>";
                } else {
                    echo "Error: " . $stmt->error . "<br>";
                }

                // Close the statement
                $stmt->close();
            } else {
                echo "Error uploading file: " . $_FILES['images']['name'][$i] . "<br>";
            }
        }
    } else {
        echo "No files selected.";
    }
}

// Close the connection
$conn->close();
