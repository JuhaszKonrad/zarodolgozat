<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1><strong>Rendelés Kezelése</strong></h1>
        <br><br>
        <?php
        
        if(isset($_SESSION['update'])){
            echo($_SESSION['update']);
            unset($_SESSION['update']);
        }
        
        ?>
        <br><br>

            <!-- Kategória hozzáadás -->

            <table class="tbl-full">
                <tr>
                    <th>N.</th>
                    <th>Étel</th>
                    <th>Ár</th>
                    <th>db</th>
                    <th>Total</th>
                    <th>Dátum</th>
                    <th>Státusz</th>
                    <th>Név</th>
                    <th>Telefonszám</th>
                    <th>Email</th>
                    <th>Cím</th>
                    <th>Kezelés</th>
                </tr>
                <?php
                
                $sql = "SELECT * FROM rendelés";

                $er = mysqli_query($kapcs,$sql);

                $rows = mysqli_num_rows($er);


                if($rows>0){
                    while($row=mysqli_fetch_assoc($er)){
                        $id = $row['id'];
                        $food = $row['étel'];
                        $price = $row['ár'];
                        $qty = $row['db'];
                        $total = $row['total'];
                        $date = $row['rend_dátum'];
                        $status = $row['status'];
                        $name = $row['rend_név'];
                        $phone = $row['rend_elérhetőség'];
                        $email = $row['rend_email'];
                        $address = $row['rend_cím'];
                        ?>

                        <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $food?></td>
                            <td><?php echo $price?></td>
                            <td><?php echo $qty?></td>
                            <td><?php echo $total?></td>
                            <td><?php echo $date?></td>
                            <td>
                                <?php
                                if($status=="megrendelve"){
                                    echo "<label><b>$status</label>";
                                }elseif($status=="szállítás alatt"){
                                    echo "<label style='color:orange; '><b>$status</label>";
                                }elseif($status=="szállítva"){
                                    echo "<label class='success'><b>$status</label>";
                                }elseif($status=="törölve"){
                                    echo "<label class='error'><b>$status</label>";
                                }

                                
                                ?>
                            </td>

                            <td><?php echo $name?></td>
                            <td><?php echo $phone?></td>
                            <td><?php echo $email?></td>
                            <td><?php echo $address?></td>
                            <td>
                            <a href="<?php echo HOME_URL;?>admin/order-modositas.php?id=<?php echo $id ?>" class="btn-secondary">Rendelés Módosítása</a>
                            </td>
                        </tr>

                        <?php
                    }
                }else{
                    echo "<div class='error'>Jelenleg nincs rendelés!</div>";
                }
                
                ?>

               


            </table>

    </div>
</div>

<?php include('partials/footer.php') ?>