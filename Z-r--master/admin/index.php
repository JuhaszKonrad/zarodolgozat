<?php include('partials/menu.php')?>

    <!-- Törzs-->
    <div class="main-content">
        <div class="wrapper">
            <h1><strong>DASHBOARD</strong></h1>
            <br><br>
            <?php 
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <br><br>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Kategóriák
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Kategóriák
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Kategóriák
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                Kategóriák
            </div>

            <div class="clearfix"></div>

        </div>

    </div>

    <?php include('partials/footer.php')?>

