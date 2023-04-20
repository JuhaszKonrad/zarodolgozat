<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1><strong>Admin hozzáadás</strong></h1> <br><br>

        <?php
            if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Teljes Név: </td>
                    <td><input type="text" name="teljesnév" placeholder="Teljes Név"></td>



                </tr>
                <tr>
                    <td>Felhasználónév: </td>
                    <td><input type="text" name="felhasználónév" placeholder="Felhasználónév"></td>
                </tr>
                <tr>
                    <td>Jelszó: </td>
                    <td><input type="password" name="jelszó" placeholder="Jelszó"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Hozzáadás" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
//Adatok kimentése a formbol az adatbázisba

if (isset($_POST['submit'])) {
    $teljesnév = $_POST['teljesnév'];
    $felhasználónév = $_POST['felhasználónév'];
    $jelszó = md5($_POST['jelszó']);
    
    $sql = "INSERT INTO admin SET 
            teljesnév ='$teljesnév',
            felhasználónév ='$felhasználónév',
            jelszó = '$jelszó'
        ";

    ;
    $er = mysqli_query($kapcs, $sql) or die(mysqli_error($kapcs));

    if($er==TRUE){
        //Sikeres hozzáadás
        //Session Változó létrehozása
        $_SESSION['add'] = "<div class='success'>Admin Sikeresen Hozzáadva!</div>";
        //Vissza az Admin Kezelés Lapra
        header('location:'.HOME_URL.'admin/admin-kezeles.php');
    }else{
        $_SESSION['add'] = "<div class='success'>Admin Hozzáadása Sikertelen!</div>";
        //Vissza az Admin Kezelés Lapra
        header('location:'.HOME_URL.'admin/admin-hozzaadas.php');
    }

}

?>