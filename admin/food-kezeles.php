<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1><strong>Ételek Kezelése</strong></h1>
        <br><br>

            <!-- Ételek hozzáadás -->
            <a href="<?php echo HOME_URL; ?>admin/food-hozzaadas.php" class="btn-primary">Ételek hozzáadás</a> <br><br>

            <?php
            
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['remove'])){
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['unauthorized-access'])){
                echo $_SESSION['unauthorized-access'];
                unset($_SESSION['unauthorized-access']);
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            
            ?>

            <table class="tbl-full">
                <tr>
                    <th>N.</th>
                    <th>Cím</th>
                    <th>Ár</th>
                    <th>Kép</th>
                    <th>Kiemelt</th>
                    <th>Aktív</th>
                    <th>Kezelés</th>
                </tr>

                <?php 
                
                $sql = "SELECT * FROM étel";

                $er = mysqli_query($kapcs,$sql);

                $count = mysqli_num_rows($er);

                if($count>0){
                    while($row=mysqli_fetch_assoc($er)){
                        $id = $row['id'];
                        $title = $row['cím'];
                        $price = $row['ár'];
                        $image_name = $row['kép_név'];
                        $featured = $row['kiemelt'];
                        $active = $row['aktív'];
                        ?>

                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $title;?></td>
                            <td><?php echo $price;?> Ft</td>
                            <td>
                                <?php 
                                if($image_name==""){
                                    echo "<div class='error'>Nincs elérhető kép!</div>";
                                }else{
                                    ?>
                                    <img src="<?php echo HOME_URL; ?>képek/food/<?php echo $image_name ?>" width="100px">
                                    <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $featured;?></td>
                            <td><?php echo $active;?></td>
                            <td>
                            <a href="<?php echo HOME_URL;?>admin/food-modositas.php?id=<?php echo $id;?>" class="btn-secondary">Étel Módosítása</a>
                            <a href="<?php echo HOME_URL;?>admin/food-torles.php?id=<?php echo $id;?>&kép_név=<?php echo $image_name ?>" class="btn-danger">Étel Törlése</a>
                            </td>
                        </tr>

                        <?php
                    }

                }else{
                    echo "<tr><td colspan ='7' class='error'>Nincs Kategória Hozzáadva!</td></tr>";
                }

                ?>

                

            </table>
    </div>
</div>

<?php include('partials/footer.php') ?>