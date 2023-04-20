<?php include('partials-frontend/menu.php')?>
    <!-- Search -->
    <section class="food-search-page text-center">
        <div class="container">
            <?php

           $search = mysqli_real_escape_string($kapcs,$_POST['search']);       

            ?>
            
            <br><br>
            <h2>Keresési eredmény erre:  <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
        
    </section>
 



    <!-- Food  Menu  -->
    <section class="food-menu">
        <div class="container">

            <?php             
            
            $sql = "SELECT * FROM étel where cím LIKE '%$search%' OR leírás LIKE '%$search%' ";

            $er = mysqli_query($kapcs,$sql);

            //Sorok megszámlálása
            $count = mysqli_num_rows($er);

            if($count>0){
                while($row=mysqli_fetch_assoc($er)){
                    $id = $row['id'];
                    $title = $row['cím'];
                    $price = $row['ár'];
                    $description = $row['leírás'];
                    $image_name = $row['kép_név'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            if($image_name==''){
                                echo "<div class='error'>Kép nem elérhető!</div>";
                            }else{
                                ?>
                                <img src="<?php echo HOME_URL;?>képek/food/<?php echo $image_name?>" alt="<?php echo $title?>" class="img-responsive img-curve">
                                <?php

                            }

                            ?>
                            
                        </div>
                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-ar"><?php echo $price;?></p>
                            <p class="food-leiras"><?php echo $description;?></p> <br>
                            <a href="<?php echo HOME_URL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Megrendelem</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <?php
                }
            }else{
                echo "<div class='error'>Nincs eredmény a keresésre</div>";
            }

            
            ?>

           
            <div class="clearfix"></div>
        </div>
    </section>
    

    <?php include('partials-frontend/footer.php')?>