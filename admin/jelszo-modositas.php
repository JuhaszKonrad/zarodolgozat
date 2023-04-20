<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Jelszó Módosítása</h1><br><br>

    <?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    ?>

    <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Jelenlegi Jelszó:</td>
                <td>
                    <input type="password" name="jelenlegi_jelszo" placeholder="Jelenlegi Jelszó">
                </td>
            </tr>
            <tr>
                <td>Új Jelszó:</td>
                <td>
                    <input type="password" name="uj_jelszo" placeholder="Új Jelszó">
                </td>
            </tr>
            <tr>
                <td>Jelszó Megerősítése:</td>
                <td>
                    <input type="password" name="jelszo_megerosit" placeholder="Jelszó Megerősítése">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo($id)?>">
                    <input type="submit" name="submit" value="Jelszó Módosítása" class="btn-primary">
                </td>
            </tr>

        </table>

    </form>


    </div>
</div>

<?php
 if(isset($_POST['submit'])){

    //adatok kinyerése a form-ból
    $id = $_POST['id'];
    $jelenlegi_jelszo = md5($_POST['jelenlegi_jelszo']);
    $uj_jelszo = md5($_POST['uj_jelszo']);
    $jelszo_megerosit = md5($_POST['jelszo_megerosit']);

    $sql = "SELECT * from admin Where id=$id AND jelszó='$jelenlegi_jelszo'";

    $er = mysqli_query($kapcs, $sql);

    if($er == true){

        $count = mysqli_num_rows($er);

        if($count==1){
            //felhasznalo letezik 
            if ($uj_jelszo == $jelszo_megerosit) {
                //jelszo frissitese
                $sql2 = "UPDATE admin SET jelszó='$uj_jelszo' where id=$id";

                $er2 = mysqli_query($kapcs, $sql);
                if($er2==true){
                    $_SESSION['change-password'] = "<div class='success'>Jelsző Módosítása Sikeres!</div>";
                    header('location:' . HOME_URL . 'admin/admin-kezeles.php');
                }else{
                    $_SESSION['change-password'] = "<div class='error'>Jelszó Módosítása Sikeres!</div>";
                    header('location:' . HOME_URL . 'admin/admin-kezeles.php');
                }
            }else{
                //vissza az admin kezeles oldalra
                $_SESSION['pwd-not-match'] = "<div class='error '>Jelszó nem egyezik</div>";
                header('location:' . HOME_URL . 'admin/admin-kezeles.php');
            }

        }else{
            //felhasznalo nem letezik
            $_SESSION['user-not-found'] = "<div class='error'>Felhasználó nem létezik</div>";
            header('location:' . HOME_URL . 'admin/admin-kezeles.php');
        }
    }

 }
?>

<?php include('partials/footer.php'); ?>