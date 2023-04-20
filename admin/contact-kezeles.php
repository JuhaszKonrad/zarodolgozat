<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1><strong>Kapcsolat</strong></h1>
        <br><br>

            <table class="tbl-full">
                <tr>
                    <th>N.</th>
                    <th>Név</th>
                    <th>Telefonszám</th>
                    <th>Email</th>
                    <th>Üzenet</th>
                    
                </tr>
                <?php
                
                $sql = "SELECT * FROM kapcsolat";

                $er = mysqli_query($kapcs,$sql);

                $rows = mysqli_num_rows($er);


                if($rows>0){
                    while($row=mysqli_fetch_assoc($er)){
                        $id = $row['id'];
                        $name = $row['kapcs_név'];
                        $phone = $row['kapcs_elérhetőség'];
                        $email = $row['kapcs_email'];
                        $msg = $row['üzenet'];
                        ?>

                        <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $name?></td>
                            <td><?php echo $phone?></td>
                            <td><?php echo $email?></td>
                            <td><?php echo $msg?></td>
                            <td>
                            <a href="<?php echo HOME_URL;?>admin/order-modositas.php?id=<?php echo $id ?>" class="btn-secondary"></a>
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