<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Kategória Módosítása</h1>
        <br><br>

        <?php

        //ID 
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            //Query
            $sql = "SELECT * FROM kategória where id=$id";

            $er = mysqli_query($kapcs, $sql);

            $count = mysqli_num_rows($er);

            if ($count == 1) {

                //Adatok kinyerése
                $row = mysqli_fetch_assoc($er);
                $title = $row['cím'];
                $currentImage = $row['kép_név'];
                $featured = $row['kiemelt'];
                $active = $row['aktív'];


            } else {
                //Redirect
                $_SESSION['no-category-found'] = "<div class='error'>Nincs ilyen kategória!</div>";
                header('location:' .HOME_URL. 'admin/category-kezeles.php');
            }

        } else {
            //Redirect
            header('location:' . HOME_URL . 'admin/category-kezeles.php');
        }

        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">

            <tr>
                <td>Cím: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title ?>">
                </td>
            </tr>

            <tr>
                <td>Jelenlegi Kép: </td>
                <td>

                    <?php

                    if ($currentImage != '') {
                        ?>
                        <img src="<?php echo HOME_URL;?>képek/kategória/<?php echo $currentImage?>" width="130px">
                        <?php
                    } else {
                        echo "<div class='error'>Nincs kép feltöltve!</div>";
                    }

                    ?>

                </td>
            </tr>

            <tr>
                <td>Új Kép: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Kiemelt: </td>
                <td>
                    <input <?php if($featured == "Igen"){echo "checked";}?> type="radio" name="featured" value="Igen">Igen

                    <input <?php if($featured == "Nem"){echo "checked";}?> type="radio" name="featured" value="Nem">Nem
                </td>
            </tr>

            <tr>
                <td>Aktív: </td>
                <td>
                    <input <?php if($active == "Igen"){echo "checked";}?> type="radio" name="active" value="Igen">Igen

                    <input <?php if($active == "Nem"){echo "checked";}?> type="radio" name="active" value="Nem">Nem
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="current_image" value="<?php echo $currentImage;?>">
                    <input type="hidden" name="id" value="<?php echo $id;?>">

                    <input type="submit" name="submit" value="Kategória Módosítása" class="btn-secondary">

                </td>
            </tr>
        </table>
    </form>

    <?php 
    
    if(isset($_POST['submit'])){
        //Adatok kinyerése a formból
        $id = $_POST['id'];
        $title = $_POST['title'];
        $currentImage = $_POST['current_image'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        //Új kép feltöltése
        //Van-e kép kiválasztva
        if(isset($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];

            //Elérhető-e a kép
            if($image_name!=""){

                //Elérhető
                //Új kép feltöltése

                 //Kiterjesztés lekérése
                 $tmp = explode('.', $image_name);
                 $ext = end($tmp);
                 //$ext = end(explode('.', $image_name));

                 //Példa: Kategória_123.jpg
                 $image_name = "Kategória_" . rand(000, 999) . '.' .$ext;

                 $source_path = $_FILES['image']['tmp_name'];

                 $destination_path = '../képek/kategória/'.$image_name;

                 $upload = move_uploaded_file($source_path, $destination_path);

                 //Sikeres-e a feltöltés
                 if ($upload == false) {
                     $_SESSION['upload'] = "<div class='error'>Kép Feltöltése Sikertelen!</div>";
                     header('location:' . HOME_URL . 'admin/category-kezeles.php');
                     //Folyamat leállítása, ha nem sikerült képet feltölteni akkor ne kerüljön semmilyen adat az adatbázisba
                     die();
                 }

                //Jelenlegi kép eltávolítása ha elérhető
                if($currentImage!=''){
                    $remove_path= "../képek/kategória/".$currentImage;
                
                    $remove = unlink($remove_path);

                    //Sikerült-e eltávolítani a képet
                    if($remove==false){
                        //Sikertelen
                        $_SESSION['failed-remove'] ="<div class='error'>Jelenlegi Kép Eltávolítása Sikertelen!</div>";
                        header('location:' . HOME_URL . 'admin/category-kezeles.php');
                        die();
                    }
                }

            }else{
                $image_name=$currentImage;
            }
        }else{
            $image_name = $currentImage;
        }

        //Adatbázisba töltés
        $sql2 = "UPDATE kategória SET cím = '$title', kép_név = '$image_name',  kiemelt = '$featured', aktív = '$active' WHERE id = '$id'";

        $er2 = mysqli_query($kapcs,$sql2);

        //Redirect
        if($er2==true){
            //Kategória Sikeresen Frissítve
            $_SESSION['update'] = "<div class='success'>Kategória Sikeresen Frissítve!</div>";
            header('location:' . HOME_URL . 'admin/category-kezeles.php');
        }else{
            //Sikertelen
            $_SESSION['update'] = "<div class='errpr'>Kategória Frissítése Sikertelen!</div>";
            header('location:' . HOME_URL . 'admin/category-kezeles.php');
        }

    }
    


    ?>
        
    </div>
</div>


<?php include('partials/footer.php'); ?>