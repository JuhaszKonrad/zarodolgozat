<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Étel hozzáadása</h1>
        <br><br>

        <?php
        
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        ?>

        <form action="" method="POST"  enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Cím: </td>
                    <td>
                        <input type="text" name="title" placeholder="Cím">
                    </td>
                </tr>

                <tr>
                    <td>Leírás: </td>
                    <td>
                        <textarea name="description" cols="35" rows="5" placeholder="Leírás"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Ár: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Kép: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Kategória: </td>
                    <td>
                        <select name="category">

                        <?php 
                            
                            //SQL (kategóriák)
                            $sql = "SELECT * FROM kategória WHERE aktív='Igen' ";

                            $er = mysqli_query($kapcs,$sql);

                            $count = mysqli_num_rows($er);

                            if($count>0){
                                //Van kategória
                                while($row=mysqli_fetch_assoc($er)){

                                    $id = $row['id'];
                                    $title = $row['cím'];

                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                    <?php

                                }

                            }else{
                                ?>

                                <option value="0">Nincs Kategória Hozzáadva</option>

                                <?php
                                
                            }
                            

                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Kiemelt: </td>
                    <td>
                        <input type="radio" name="featured" value="Igen" >Igen
                        <input type="radio" name="featured" value="Nem" >Nem
                    </td>
                </tr>

                <tr>
                    <td>Aktív: </td>
                    <td>
                        <input type="radio" name="active" value="Igen" >Igen
                        <input type="radio" name="active" value="Nem" >Nem
                    </td>
                </tr>

                <tr>
                    <td colspan="2">

                        <input type="submit" name="submit" value="Hozzáadás" class="btn-secondary">

                    </td>
                </tr>

            </table>

        </form>

        <?php
        
        if(isset($_POST['submit'])){
            
            //Adatok kinyerése a formból
            $title= $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            if(isset($_POST['featured'])){

                $featured = $_POST['featured'];

            }else{
                $featured = "Nem";
            }

            if(isset($_POST['active'])){

                $active = $_POST['active'];

            }else{
                $active = "Nem";   
            }
            

            //Kép feltöltése
            if(isset($_FILES['image']['name'])){

                $image_name = $_FILES['image']['name'];

                if($image_name != ""){
                    
                    $tmp = explode('.', $image_name);
                    $ext = end($tmp);

                    $image_name = "Food-" . rand(000, 999) . '.' .$ext;

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = '../képek/food/'.$image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if($upload==false){
                        $_SESSION['upload'] = "<div class='error'>Kép Feltöltése Sikertelen! </div>";
                        //Redirect
                        header('location:'.HOME_URL.'admin/food-hozzaadas.php');
                        die();
                    }

                }

            }else{
                $image_name = "";
            }


            //Insert
            $sql2 = "INSERT INTO étel SET cím= '$title', leírás ='$description', ár = $price, kép_név = '$image_name', kategória_id =$category, kiemelt = '$featured', aktív = '$active' ";

            $er2 = mysqli_query($kapcs,$sql2);

            if($er2 == true){
                $_SESSION['add'] = "<div class='success'>Hozzáadás Sikeres! </div>";
                //Redirect
                header('location:'.HOME_URL.'admin/food-kezeles.php');

            }else{
                $_SESSION['add'] = "<div class='error'>Hozzáadás Sikertelen! </div>";
                //Redirect
                header('location:'.HOME_URL.'admin/food-kezeles.php');
            }            

        }

        ?>

    </div>
</div>


<?php include('partials/footer.php'); ?>