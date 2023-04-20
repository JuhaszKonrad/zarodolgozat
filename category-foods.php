<?php include('partials-frontend/menu.php')?>

<?php
    if(isset($_GET['category_id'])){
        $category_id= $_GET['category_id'];
        $sql = "SELECT cím FROM kategória WHERE id=$category_id";

        $er= mysqli_query($kapcs,$sql);

        $row = mysqli_fetch_assoc($er);

        $category_title = $row['cím'];

    }else{
        header('location:'.HOME_URL);
    }

?>

    <!-- Food Search -->
    <section class="food-search-page text-center">
        <div class="container">
            
            <h2>Ételek <a href="#" class="text-white">"<?php echo $category_title;?>"</a></h2>

        </div>
    </section>



    <!-- Food  Menu  -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Ajánlatunk</h2>

            <?php
            
            $sql2 = "SELECT * from étel WHERE kategória_id=$category_id";

            $er2 = mysqli_query($kapcs,$sql2);

            $row2 = mysqli_num_rows($er2);

            if($row2>0){
                while($row2=mysqli_fetch_assoc($er2)){
                    $id = $row2['id'];
                    $title = $row2['cím'];
                    $price = $row2['ár'];
                    $desc = $row2['leírás'];
                    $img_name = $row2['kép_név'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            
                            if($img_name==""){
                                echo "<div class='error'>Kép nem elérhető!</div>";
                            }else{
                                ?>
                                <img src="<?php echo HOME_URL?>képek/food/<?php echo $img_name;?>" alt="<?php echo $title?>" class="img-responsive img-curve">
                                <?php

                            }

                            ?>
                            
                        </div>
                        <div class="food-menu-desc">
                            <h4><?php echo $title?></h4>
                            <p class="food-ar"><?php echo number_format("$price",0,","," "); echo " Ft"?></p>
                            <p class="food-leiras"><?php echo $desc?></p> <br>
                            <a href="<?php echo HOME_URL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Megrendelem</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <?php
                }
            }else{
                echo "<div class='error'>Nincs elérhető kategória!</div>";
            }

            ?>

        

            <div class="clearfix"></div>

            

        </div>

    </section>


    <?php include('partials-frontend/footer.php')?>