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
                    kép helye
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

                                echo "<option vale='$category_id'>$category_title</option>";
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
                    <input type="radio" name="featured" value="Igen">Igen
                    <input type="radio" name="featured" value="Nem">Nem
                </td>
            </tr>

            <tr>
                <td>Aktív:</td>
                <td>
                    <input type="radio" name="active" value="Igen">Igen
                    <input type="radio" name="active" value="Nem">Nem
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" value="Módosítás" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>

    </div>
</div>

<?php include('partials/footer.php')?>