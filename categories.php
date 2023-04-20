<?php include('partials-frontend/menu.php')?>
    <!-- Categories -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Ajánlatunk</h2>

            <?php
            
            $sql = "SELECT * FROM kategória WHERE aktív = 'Igen' ";

            $er = mysqli_query($kapcs,$sql);

            $count = mysqli_num_rows($er);

            if($count > 0){
                while($row=mysqli_fetch_assoc($er)){
                    $id=$row['id'];
                    $title=$row['cím'];
                    $image_name = $row['kép_név'];
                    ?>

                    <a href="<?php echo HOME_URL;?>category-foods.php?category_id=<?php echo $id;?>">
                    <div class="box-3 float-container">
                        <?php
                         if($image_name==""){
                            echo "<div class='error'>Kép nem elérhető!</div>";
                        }else{
                            ?>

                            <img src="<?php HOME_URL;?>képek/kategória/<?php echo $image_name;?>" alt="<?php echo $title?>" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                        <h3 class="float-text text-white"><?php echo $title?></h3>
                    </div>
                    </a>

                    <?php
                }
            }
            
            ?>

            

            

            <div class="clearfix"></div>
        </div>
    </section>

    <?php include('partials-frontend/footer.php')?>