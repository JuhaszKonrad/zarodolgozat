<?php include('partials/menu.php')?>

    <!-- Törzs-->
    <div class="main-content">
        <div class="wrapper">
            <h1 class="text-center"><strong>DASHBOARD</strong></h1>
            <br><br>
            <?php 
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <br><br>


            <a href="category-kezeles.php">
            <div class="col-4 text-center">
                <?php
                    $sql = "SELECT * from kategória";
                    $er = mysqli_query($kapcs,$sql);

                    $count = mysqli_num_rows($er);

                ?>
                <h1><?php echo $count?></h1>
                <br>
                Kategóriák
            </div>
            </a>

            <a href="food-kezeles.php">
            <div class="col-4 text-center">
                <?php
                    $sql2 = "SELECT * from étel";
                    $er2 = mysqli_query($kapcs,$sql2);

                    $count2 = mysqli_num_rows($er2);

                ?>
                <h1><?php echo $count2?></h1>
                <br>
                Ételek
            </div>
            </a>

            <a href="order-kezeles.php">
            <div class="col-4 text-center">
                <?php
                    $sql3 = "SELECT * from rendelés";
                    $er3 = mysqli_query($kapcs,$sql3);

                    $count3 = mysqli_num_rows($er3);

                ?>
                <h1><?php echo $count3?></h1>
                <br>
                Rendelések
            </div>
            </a>

            <div class="col-4 text-center">
                <?php
                $sql4= "SELECT SUM(total) AS TOTAL FROM rendelés WHERE status ='szállítva' ";
                $er4 = mysqli_query($kapcs,$sql4);

                $row = mysqli_fetch_assoc($er4);

                $bevetel = $row['TOTAL'];

                ?>
                <h1 class="success"><?php echo number_format("$bevetel",0,","," "); echo " Ft"?></h1>
                <br>
                Bevétel
            </div>

            <div class="clearfix"></div>

        </div>

    </div>

    <?php include('partials/footer.php')?>

