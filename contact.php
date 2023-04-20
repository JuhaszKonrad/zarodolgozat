<?php include("partials-frontend/menu.php");?>

<section class="order">
        <div class="container">

            <h2 class="text-center success">Kapcsolat</h2>
            <div class="msg"></div>

            <form action="" method="POST" class="order">
            <fieldset>

                    <div class="food-menu-img">
                            <a href="<?php echo HOME_URL;?>"><img src="képek/logo.png" alt="Logo" style="height:90px "></a>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Adatok</legend>
                    <div class="order-label">Teljes Név</div>
                    <input type="text" name="full-name" placeholder="Teljes Név" class="input-responsive"
                        required>

                    <div class="order-label">Telefonszám</div>
                    <input type="tel" name="phone" placeholder="+36201234567" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="pelda@gmail.com" class="input-responsive"
                        required>

                    <div class="order-label">Üzenet</div>
                    <textarea name="message" rows="5" placeholder="Üzenet" class="input-responsive"
                        required></textarea>

                    <input type="submit" name="submit" value="Küldés" class="btn btn-primary">
                </fieldset>

            </form>
</section>
<?php
            
            if(isset($_POST['submit'])){
            
                $name = $_POST['full-name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                $sql =  "INSERT INTO kapcsolat SET
                kapcs_név = '$name',
                kapcs_elérhetőség = '$phone',
                kapcs_email = '$email',
                üzenet= '$message'
                ";
                
                $er = mysqli_query($kapcs,$sql);

                if($er==true){
                    $_SESSION['order'] = "<div class='success text-center'>Majd értesítjük!</div>";
                    header('location:'.HOME_URL);
                }else{
                    $_SESSION['order'] = "<div class='error text-center'>Sikertelen próbálkozás kérjük lépjen kapcsolatba ügyfélszolgálatunkkal!</div>";
                    header('location:'.HOME_URL);
                }
            } ?>
            
<?php include("partials-frontend/footer.php") ?>
