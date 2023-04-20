<?php include("partials-frontend/menu.php");?>
<?php
//ini_set('display_errors',1); ini_set('display_startup_errors',1); error_reporting(E_ALL);
if(isset($_GET['food_id'])){
    $food_id = $_GET['food_id'];

    $sql = "SELECT * FROM étel WHERE id=$food_id";

    $er = mysqli_query($kapcs,$sql);

    $count = mysqli_num_rows($er);

    if($count == 1){
        $row = mysqli_fetch_assoc($er);
        $title = $row['cím'];
        $price = $row['ár'];
        $img_name = $row['kép_név'];
        $desc = $row['leírás'];
        
    }else{
        header('location:'.HOME_URL);
    }

}else{
    header('location:'.HOME_URL);
}

?>

    <section class="order">
        <div class="container">
            <div id="os-con"></div>
            <h2 class="text-center">Töltse ki adatait!</h2>
            <div id="order"></div>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Választott Étel</legend>

                    <div class="food-menu-img">
                        <?php
                        if($img_name==""){
                            echo "<div class='error'>A kép nem elérhető!</div>";
                        }else{
                            ?>
                            <img src="<?php echo HOME_URL;?>képek/food/<?php echo $img_name?>" alt="<?php echo $title ?>" class="img-responsive img-curve">
                            <?php

                        }

                        ?>
                        
                    </div>

                    <div class="food-menu-desc">
                        <h3><?php echo $title?></h3>
                        <input type="hidden" name="étel" value="<?php echo $title?>">
                        <input type="hidden" name="ár" value="<?php echo $price?>">
                        <p class="food-ar"><?php echo $price?> Ft</p>
                        <p class="food-leiras"><?php echo $desc?></p> <br>
                        <div class="order-label">Darab</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>

                    </div>

                </fieldset>

                <fieldset>
                    <legend>Szállítási Adatok</legend>
                    <div class="order-label">Teljes Név</div>
                    <input type="text" name="full-name" placeholder="Teljes Név" class="input-responsive"
                        required>

                    <div class="order-label">Telefonszám</div>
                    <input type="tel" name="phone" placeholder="+36201234567" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="pelda@gmail.com" class="input-responsive"
                        required>

                    <div class="order-label">Cím</div>
                    <textarea name="address" rows="5" placeholder="Cím" class="input-responsive" required></textarea>
                    
                    <input type="submit" name="submit" value="Rendelés Leadása" class="btn btn-primary"/>
                    
                </fieldset>
            </form>
            </div>
    </section>
            
            <?php
            
            if(isset($_POST['submit'])){
                
                $food =  $_POST["étel"];
                $price = $_POST["ár"];
                $qty = $_POST["qty"];

                $total = $price*$qty;
                $order_date = date('Y-m-d h-i'); 
                //megrendelve, szállítás alatt, szállítva, törölve
                $status = "megrendelve";
                $name = $_POST['full-name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $address = $_POST['address'];

                $sql2 =  "INSERT INTO rendelés SET
                étel = '$food',
                ár = '$price',
                db = '$qty',
                total = '$total',
                rend_dátum = '$order_date',
                status = '$status',
                rend_név = '$name',
                rend_elérhetőség = '$phone',
                rend_email = '$email',
                rend_cím = '$address'
                ";
                
                $er2 = mysqli_query($kapcs,$sql2);
               
                if($er2==true){
                    $_SESSION['order'] = "<div class='success text-center'>Rendelés sikeresen leadva! Kollegáink értesítik amint szállítasra kerül!</div>";
                     header('location:'.HOME_URL);
                }else{
                    $_SESSION['order'] = "<div class='error text-center'>Rendelés leadása sikertelen!</div>";
                    $_SESSION['error'] = mysqli_error($kapcs);
                    header('location:'.HOME_URL);
                }
            }?>

    <?php include('partials-frontend/footer.php')?>