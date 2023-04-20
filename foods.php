<?php include('partials-frontend/menu.php')?>

    <!-- Food Search -->
    <section class="food-search text-center">
        <div class="container">
            <form action="<?php echo HOME_URL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Étel keresése" required>
                <input type="submit" name="submit" value="Keresés" class="btn btn-primary">
            </form>
        </div>
    </section>

    <!-- Food  Menu  -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Ájánlatunk</h2>

            <?php 

            $sql = "SELECT * FROM étel WHERE aktív = 'Igen'";

            $er = mysqli_query($kapcs,$sql);
            $count = mysqli_num_rows($er);

            if($count > 0){
                while($row=mysqli_fetch_assoc($er)){
                    $id = $row['id'];
                    $title = $row['cím'];
                    $description = $row['leírás'];
                    $price = $row['ár'];
                    $image_name = $row['kép_név'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            if($image_name==""){
                                echo "<div class='error'>Kép nem elérhető!</div>";
                            }else{
                                ?>
                                 <img src="<?php echo HOME_URL;?>képek/food/<?php echo $image_name?>" alt="<?php $title?>" class="img-responsive img-curve">
                                <?php

                            }
                            ?>
                        </div>
                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-ar"><?php echo "$price Ft";?></p>
                            <p class="food-leiras"><?php echo $description;?></p> <br>
                            <a href="<?php echo HOME_URL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Megrendelem</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <?php
                }
            }else{
                echo "<div class='error'>Nem elérhető!</div>";
            }

            
            
            ?>
            


            <div class="clearfix"></div>
        </div>
    </section>

    <?php include('partials-frontend/footer.php')?>