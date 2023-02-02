<?php include('../config/konstansok.php') ?>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        body{
            background-color: #1289A7;
        }
    </style>
</head>

<body>
    <div class="login">
        <h1 class="text-center">Bejelentkezés</h1><br><br>

        <?php 
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-msg'])){
            echo $_SESSION['no-login-msg'];
            unset($_SESSION['no-login-msg']);
        }
        ?>
        <br>
        <br>

        <form action="" method="post" class="text-center">
           <strong>Felhasználónév</strong>  <br><br>
            <input type="text" name="felhasználónév" placeholder="Felhasználónév"><br><br>
            <strong>Jelszó</strong> <br><br>
            <input type="password" name="jelszó" placeholder="Jelszó"><br><br>

            <input type="submit" name="submit" value="Bejelentkezés" class="btn-primary"><br><br>
        </form>

        <p class="text-center">Minden jog fenntartva. Tervezte <a href="#">Juhász Konrád</a>.</p>
    </div>

</body>

</html>
<?php

if (isset($_POST['submit'])) {

    //adatok lekérése a login-ból
    $felhasználónév = $_POST['felhasználónév'];
    $jelszó = md5($_POST['jelszó']);

    //SQL parancs
    $sql = "SELECT * from admin where felhasználónév='$felhasználónév' AND jelszó ='$jelszó' ";

    $er = mysqli_query($kapcs, $sql);

    //Megszámlálás ?= felhasználó létezik. 
    $count = mysqli_num_rows($er);

    if($count==1){
        //Felhasználó létezik és sikeres a bejelentkezés
        $_SESSION['login'] = "<div class='success'>Sikeres Bejelentkezés!</div>";
        $_SESSION['user'] = $felhasználónév; // megnézzük hogy a felhasználó be van-e jelentkezve


        header('location:' . HOME_URL . 'admin/');
    }else{
        //Felhasználó nem létezik és sikertelen a bejelentkezés
                $_SESSION['pwd-not-match'] = "<div class='error '>Jelszó nem egyezik</div>";
        $_SESSION['login'] = "<div class='error text-center'>Helytelen Felhasználónév/Jelszó!</div>";
        header('location:' . HOME_URL . 'admin/login.php');
    }
}

?>