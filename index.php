
    <?php include('partials-frontend/menu.php')?>
    <!-- Food  Search  -->
    <section class="food-search text-center">
        <div class="container">
            <form action="<?php echo HOME_URL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Étel keresése">
                <input type="submit" name="submit" value="Keresés" class="btn btn-primary">
            </form>
        </div>
    </section>

    <?php
    
    if(isset($_SESSION['order'])){
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    
    ?>

    <!-- Categories  -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Kategóriák</h2>

            <?php
            
            //SQL
            $sql = "SELECT * FROM kategória WHERE kiemelt='Igen' AND aktív='Igen' LIMIT 3";

            $er = mysqli_query($kapcs,$sql);

            //Sorok megszámlálása
            $count = mysqli_num_rows($er);

            if($count>0){
                while($row=mysqli_fetch_assoc($er)){
                    $id = $row['id'];
                    $title = $row['cím'];
                    $image_name = $row['kép_név'];
                    ?>
                    
                    <a href="<?php echo HOME_URL;?>category-foods.php?category_id=<?php echo $id;?>">
                    <div class="box-3 float-container">
                        <?php

                        //Elérhető-e a kép
                        if($image_name==""){
                            echo "<div class='error'>Kép nem elérhető!</div>";
                        }else{
                            ?>

                            <img src="<?php HOME_URL;?>képek/kategória/<?php echo $image_name;?>" alt="" class="img-responsive img-curve">
                            <?php
                        }
                        
                        ?>
                        
                        <h3 class="float-text text-white"><?php echo $title;?></h3>
                    </div></a>



                    <?php
                }
            }else{
                echo "<div class='error'>Nincs Elérhető Kategória!</div>";
            }

 
            ?>


            <div class="clearfix">

            </div>
        </div>
    </section>

    <!-- Food  Menu  -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Ajánlatunk</h2><br>

            <?php
            
            $sql2 = "SELECT * FROM étel WHERE kiemelt='Igen' AND aktív='Igen' LIMIT 6";

            $er2 = mysqli_query($kapcs,$sql2);

            $count2 = mysqli_num_rows($er2);

            if($count2>0){
                while($row=mysqli_fetch_assoc($er2)){
                    $id = $row['id'];
                    $title=$row['cím'];
                    $price = $row['ár'];
                    $description = $row['leírás'];
                    $image_name = $row['kép_név'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php

                            if($image_name==""){
                                echo "<div class='error'>Kép nem elérhető!</div>";
                            }else{
                                ?>
                                <img src="<?php echo HOME_URL;?>képek/food/<?php echo $image_name?>" alt="Songoku Pizza" class="img-responsive img-curve">
                                <?php
                            }


                            ?>
                            
                        </div>
                        <div class="food-menu-desc">
                            <h4><?php echo $title?></h4>
                            <p class="food-ar"><?php echo $price?> Ft</p>
                            <p class="food-leiras"><?php echo $description?></p> <br>
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