<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1><strong>Kategóriák Kezelése</strong></h1>
        <br><br>

        <?php

            if (isset($_SESSION['add'])) {
                echo ($_SESSION['add']);
                unset($_SESSION['add']);
            }

            if (isset($_SESSION['remove'])) {
                echo ($_SESSION['remove']);
                unset($_SESSION['remove']);
            }

            if (isset($_SESSION['delete'])) {
                echo ($_SESSION['delete']);
                unset($_SESSION['delete']);
            }
            if (isset($_SESSION['no-category-found'])) {
                echo ($_SESSION['no-category-found']);
                unset($_SESSION['no-category-found']);
            }

            if (isset($_SESSION['update'])) {
                echo ($_SESSION['update']);
                unset($_SESSION['update']);
            }

            if (isset($_SESSION['upload'])) {
                echo ($_SESSION['upload']);
                unset($_SESSION['upload']);
            }

            if (isset($_SESSION['failed-remove'])) {
                echo ($_SESSION['failed-remove']);
                unset($_SESSION['failed-remove']);
            }
            /*if (isset($_SESSION['img_already_exist'])) {
                echo ($_SESSION['img_already_exist']);
                unset($_SESSION['img_already_exist']);
            }*/

        ?>
        <br><br>
        <!-- Kategória hozzáadás -->
        <a href="<?php echo HOME_URL; ?>admin/category-hozzaad.php" class="btn-primary">Kategória hozzáadás</a> <br><br>

        <table class="tbl-full">
            <tr>
                <th>N.</th>
                <th>Cím</th>
                <th>Kép</th>
                <th>Kiemelt</th>
                <th>Aktív</th>
                <th>Kezelés</th>
            </tr>

            <?php

            $sql = "SELECT * FROM kategória ";

            $er = mysqli_query($kapcs, $sql);

            $count = mysqli_num_rows($er);

            if($count > 0 ){
                
                while($row=mysqli_fetch_assoc($er)){
                    $id = $row['id'];
                    $cím = $row['cím'];
                    $kép_név = $row['kép_név'];
                    $kiemelt = $row["kiemelt"];
                    $aktív = $row['aktív'];
                    ?>

                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $cím; ?></td>

                    <td>

                        <?php 

                            //Van-e kép
                            if($kép_név!=""){
                                ?>
                                <img src="<?php echo HOME_URL; ?>képek/kategória/<?php echo $kép_név ?>" width="100px">
                                <?php
                            }else{
                                echo "<div class='error'>Nincs elérhető kép!</div>";
                            }
                        ?>

                    </td>

                    <td><?php echo $kiemelt; ?></td>
                    <td><?php echo $aktív; ?></td>
                    <td>
                        <a href="<?php echo HOME_URL; ?>admin/category-modositas.php?id=<?php echo $id;?>" class="btn-secondary">Kategória Módosítása</a>
                        <a href="<?php echo HOME_URL; ?>admin/category-torles.php?id=<?php echo $id;?>&kép_név=<?php echo $kép_név?>" class="btn-danger">Kategória Törlése</a>
                    </td>
                </tr>

                    <?php
                }

            }else{
                ?>
                <tr>
                    <td colspan="6"><div class="error">Nincs Kategória Hozzáadva!</div></td>
                </tr>

                <?php 
            }

            ?>

            

        </table>
    </div>
</div>

<?php include('partials/footer.php') ?>
