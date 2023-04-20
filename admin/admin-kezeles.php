<?php include('partials/menu.php'); ?>

<!-- Törzs-->
<div class="main-content">
    <div class="wrapper">
        <h1><strong>Adminok Kezelése</strong></h1><br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //SESSION ÜZENET MEGJELENÍTÉSE
            unset($_SESSION['add']); //SESSION ÜZENET ELREJTÉSE
        }
        if(isset($_SESSION['delete'])){
            echo ($_SESSION['delete']); //SESSION ÜZENET MEGJELENÍTÉSE
            unset($_SESSION['delete']); //SESSION ÜZENET ELREJTÉSE
        }
        if(isset($_SESSION['update'])){
            echo ($_SESSION['update']); //SESSION ÜZENET MEGJELENÍTÉSE
            unset($_SESSION['update']); //SESSION ÜZENET ELREJTÉSE
        }
        if(isset($_SESSION['user-not-found'])){
            echo ($_SESSION['user-not-found']); //SESSION ÜZENET MEGJELENÍTÉSE
            unset($_SESSION['user-not-found']); //SESSION ÜZENET ELREJTÉSE
        }
        if(isset($_SESSION['pwd-not-match'])){
            echo ($_SESSION['pwd-not-match']); 
            unset ($_SESSION['pwd-not-match']);
        }
    
        if(isset($_SESSION['change-password'])){
            echo ($_SESSION['change-password']); 
            unset ($_SESSION['change-password']);
        }
        ?>
        <br><br>

        <!-- Admin hozzáadás -->
        <a href="admin-hozzadas.php" class="btn-primary">Admin hozzáadás</a> <br><br>

        <table class="tbl-full">
            <tr>
                <th>N.</th>
                <th>Felhasználónév</th>
                <th>Jelszó</th>
                <th>Kezelés</th>
            </tr>

            <?php
            $sql = "SELECT * FROM admin";
            $er = mysqli_query($kapcs, $sql);
            $n = 1;
            if ($er == true) {
                $count = mysqli_num_rows($er);

                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($er)) {
                        $id = $rows['id'];
                        $teljesnév = $rows['teljesnév'];
                        $felhasználónév = $rows['felhasználónév'];

                        

            ?>
            <tr>
                <td>
                    <?php echo $n++ ?>
                </td>
                <td>
                    <?php echo $teljesnév ?>
                </td>
                <td>
                    <?php echo $felhasználónév ?>
                </td>
                <td>
                    <a href="<?php echo HOME_URL ?>admin/jelszo-modositas.php?id=<?php echo $id; ?>" class="btn-primary">Jelszó Módosítása</a>
                    <a href="<?php echo HOME_URL ?>admin/admin-modositas.php?id=<?php echo $id; ?>" class="btn-secondary">Admin Módosítása</a>
                    <a href="<?php echo HOME_URL ?>admin/admin-torles.php?id=<?php echo $id; ?>" class="btn-danger">Admin Törlése</a>
                </td>
            </tr>

            <?php

                    }
                } else {

                }
            }
            ?>


        </table>

    </div>
</div>

<?php include('partials/footer.php'); ?>