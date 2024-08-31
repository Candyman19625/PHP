<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <form name="frmlogin" method="post" action="login.php">

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="Username" required name="Username" class="form-control" />
                <label class="form-label" for="form2Example1">ชื่อผู้ใช้</label>
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="Password" required name="Password" class="form-control" />
                <label class="form-label" for="form2Example2">รหัสผ่าน</label>
            </div>

            <!-- Submit button -->
            <button type="submit">Login</button>


        </form>
    </div>
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>

</html>