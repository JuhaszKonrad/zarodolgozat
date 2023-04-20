<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Admin Módosítása</h1> <br><br>

        <?php
        //ID lekérése
        
        $id = $_GET['id'];
        $sql = "SELECT * FROM admin WHERE id=$id";
        $er = mysqli_query($kapcs, $sql);
        if ($er == true) {

            $count = mysqli_num_rows($er);
            if ($count == 1) {

                //Adatok lekérése
                //echo "Admin elérhető";
                $row = mysqli_fetch_assoc($er);
                $teljesnév = $row['teljesnév'];
                $felhasználónév = $row['felhasználónév'];


            } else {
                //Vissza navigálás
                header('location:' . HOME_URL . 'admin/admin-kezeles.php');
            }
        }

        ?>

        <form action="" method="post">

            <table class="tbl-30">
                <tr>
                    <td>Teljes Név: </td>
                    <td><input type="text" name="teljesnév" value="<?php echo $teljesnév ?>"></td>
                </tr>

                <tr>
                    <td>Felhasználónév: </td>
                    <td><input type="text" name="felhasználónév" value="<?php echo $felhasználónév ?>"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Admin Módosítása" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {

    //echo 'submit';

    //adatok kinyerése a form-ból
    $id = $_POST['id'];
    $teljesnév = $_POST['teljesnév'];
    $felhasználónév = $_POST['felhasználónév'];

    $sql = "UPDATE admin SET
    teljesnév = '$teljesnév',
    felhasználónév = '$felhasználónév'
    WHERE id = '$id'
    ";

    $er = mysqli_query($kapcs, $sql);

    if($er == true){
        $_SESSION['update'] = "<div class='success'>Admin Módosítása Sikeres!</div>";
        header('location:' . HOME_URL . 'admin/admin-kezeles.php');
    }
    else{
        $_SESSION['update'] = "<div class='error'>Admin Módosítása Sikertelen!</div>";
        header('location:' . HOME_URL . 'admin/admin-kezeles.php');
    }

}


?>

<?php include('partials/footer.php') ?>