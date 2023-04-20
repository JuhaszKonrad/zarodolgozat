<?php include('partials/menu.php')?>

<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM étel WHERE id=$id";
        
        $er2 = mysqli_query($kapcs,$sql2);

        $row2 = mysqli_fetch_assoc($er2);

        $title = $row2['cím'];
        $description = $row2['leírás'];
        $price = $row2['ár'];
        $currentImage = $row2['kép_név'];
        $current_category = $row2['kategória_id'];
        $featured = $row2['kiemelt'];
        $active = $row2['aktív'];


    }else{
        header('location:'.HOME_URL.'admin/food-kezeles.php');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Étel Módosítása</h1> <br><br>

        <form action="" method="post" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Cím: </td>
                <td>
                    <input type="text" name="title" placeholder="Cím" value="<?php echo $title;?>">
                </td>
            </tr>

            <tr>
                <td>Leírás: </td>
                <td>
                    <textarea name="description" cols="35" rows="5"><?php echo $description;?></textarea>
                </td>
            </tr>

            <tr>
                <td>Ár: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price;?>" >
                </td>
            </tr>

            <tr>
                <td>Jelenlegi kép: </td>
                <td>
                    <?php if($currentImage==""){
                        echo "<div class='error'>Nincs Elérhető Kép!</div>";
                    }else{
                        ?>
                        <img src="<?php echo HOME_URL; ?>képek/food/<?php echo $currentImage?>" alt="<?php echo $currentImage?>" width="100px">
                        <?php
                        
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Új kép:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Kategória: </td>
                <td>
                    <select name="category">

                        <?php
                        
                        $sql="SELECT * FROM kategória WHERE aktív='Igen' ";

                        $er= mysqli_query($kapcs,$sql);

                        $count = mysqli_num_rows($er);

                        if($count>0){
                            while($row=mysqli_fetch_assoc($er)){
                                $category_title =$row['cím'];
                                $category_id =$row['id'];
                                ?>
                                <option <?php if($current_category == $category_id){echo "Selected";} ?> value="<?php echo $category_id;?>"><?php echo $category_title?></option>
                                <?php
                            }
                        }else{
                            echo "<option value='0'>Kategória nem elérhető!</option>";
                        }

                        ?>

                        <option value="1">1</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Kiemelt:</td>
                <td>
                    <input <?php if($featured=="Igen"){ echo "checked";}?> type="radio" name="featured" value="Igen">Igen
                    <input <?php if($featured=="Nem"){ echo "checked";}?> type="radio" name="featured" value="Nem">Nem
                </td>
            </tr>

            <tr>
                <td>Aktív:</td>
                <td>
                    <input <?php if($active=="Igen"){ echo "checked";}?> type="radio" name="active" value="Igen">Igen
                    <input <?php if($active=="Nem"){ echo "checked";}?> type="radio" name="active" value="Nem">Nem
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="current_image" value="<?php echo $currentImage; ?>">
                    <input type="submit" name="submit" value="Módosítás" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>
        <?php
        
        if(isset($_POST['submit'])){
          
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description= $_POST['description'];
            $price = $_POST['price'];
            $currentImage = $_POST['current_image'];
            $category = $_POST['category'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            if(isset($_FILES['image']['name'])){
                $image_name = $_FILES['image']['name'];
                if($image_name!=""){
                    $tmp = explode(".",$image_name);
                    $ext = end($tmp);
                    $image_name = "Food-" . rand(000, 999) . '.' .$ext;

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = '../képek/food/'.$image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);
                    if($upload==false){
                        $_SESSION['upload'] = "<div class='error'>Kép Feltöltése Sikertelen!</div>";
                        header('location:'.HOME_URL.'admin/food-kezeles.php');
                        die();
                    }

                    if($currentImage!=""){
                        $path = "../képek/food/".$currentImage;

                        $remove = unlink($path);
                        if($remove == false){
                            $_SESSION['remove'] = "<div class='error'>Kép Eltávolítása Sikertelen!</div>";
                            header('location:'.HOME_URL.'admin/food-kezeles.php');
                            die();
                        }
                    }
                }else{
                    $image_name=$currentImage;
                }

            }else{
                $image_name = $currentImage;
            }

            $sql3 = "UPDATE étel SET cím='$title', leírás='$description', ár=$price, kép_név='$image_name', kategória_id='$category', kiemelt='$featured', aktív='$active' WHERE id=$id ";

            $er3 =mysqli_query($kapcs,$sql3);
            
            if($er3==true){
                $_SESSION['update'] ="<div class='success'>Sikeres Módosítás!</div>";
                header('location:'.HOME_URL.'admin/food-kezeles.php');
            }else{
                $_SESSION['update'] ="<div class='error'>Sikertelen Módosítás!</div>";
                header('location:'.HOME_URL.'admin/food-kezeles.php');
            }
            
        }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php')?>