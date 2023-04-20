
<?php include('../config/konstansok.php');
include('login-check.php');
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Admin</title>
</head>

<body>

    <!-- Menu -->
    <div class="menu">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Főoldal</a></li>
                <li><a href="admin-kezeles.php">Admin</a></li>
                <li><a href="category-kezeles.php">Kategóriák</a></li>
                <li><a href="food-kezeles.php">Ételek</a></li>
                <li><a href="order-kezeles.php">Rendelés</a></li>
                <li><a href="contact-kezeles.php">Kapcsolat</a></li>
                <li><a href="logout.php" class="piros">Kijelentkezés</a></li>
            </ul>
        </div>

    </div>