<?php include('partials/menu.php')?>
<div class="main-content">
    <div class="wrapper">
        <h1>Rendelés Módosítása</h1> <br><br>

        <?php 
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM rendelés WHERE id=$id";

            $er = mysqli_query($kapcs,$sql);
            
            $count = mysqli_num_rows($er);

            if($count==1){

                $row = mysqli_fetch_assoc($er);

                $food = $row['étel'];
                $price = $row['ár'];
                $qty = $row['db'];
                $status = $row['status'];
                $name = $row['rend_név'];
                $phone = $row['rend_elérhetőség'];
                $email = $row['rend_email'];
                $address = $row['rend_cím'];
                
            }else{
                header('location:'.HOME_URL."admin/order-kezeles.php");
            }

            

        }else{
            header('location:'.HOME_URL."admin/order-kezeles.php");
        }
        
        
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Étel</td>
                    <td><b><?php echo $food?></td>
                </tr>

                <tr>
                    <td>Ár</td>
                    <td><?php echo $price?> Ft</td>
                </tr>

                <tr>
                    <td>Mennyiség</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="megrendelve")echo "selected" ?> value="megrendelve">Megrendelve</option>
                            <option <?php if($status=="szállítás alatt")echo "selected" ?> value="szállítás alatt">Szállítás alatt</option>
                            <option <?php if($status=="szállítva")echo "selected" ?> value="szállítva">Szállítva</option>
                            <option <?php if($status=="törölve")echo "selected" ?> value="törölve">Törölve</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Név</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name?>">
                    </td>
                </tr>

                <tr>
                    <td>Telefonszám</td>
                    <td>
                        <input type="text" name="phone" value="<?php echo $phone?>">
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email?>">
                    </td>
                </tr>

                <tr>
                    <td>Cím</td>
                    <td>
                        <textarea cols="30" rows="5" name="address" ><?php echo $address?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <input type="submit" name="submit" value="Módosítás" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

        <?php
        
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $price*$qty;
            $status = $_POST['status'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['addtess'];

            $sql2 = "UPDATE rendelés SET
            db = $qty,
            total = $total,
            status = '$status',
            rend_név = '$name',
            rend_elérhetőség = '$phone',
            rend_email = '$email',
            rend_cím = '$address'
            WHERE id=$id
            ";

            $er2 = mysqli_query($kapcs,$sql2);


            if($er2 == true){
                $_SESSION['update'] = "<div class='success'>Rendelés sikeresen frissítve!</div>";
                header('location:'.HOME_URL.'admin/order-kezeles.php');
            }else{
                $_SESSION['update'] = "<div class='error'>Rendelés frissítése sikertelen !</div>";
                header('location:'.HOME_URL.'admin/order-kezeles.php');
            }
        

        }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php')?>