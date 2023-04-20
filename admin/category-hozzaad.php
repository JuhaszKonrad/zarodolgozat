<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Kategória hozzáadás</h1><br><br>

        <?php

        if (isset($_SESSION['add'])) {
            echo ($_SESSION['add']);
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['upload'])) {
            echo ($_SESSION['upload']);
            unset($_SESSION['upload']);
        }

        ?>

        <br><br>

        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Cím:</td>
                    <td><input type="text" name="cím" placeholder="Kategória Címe"></td>
                </tr>
                <tr>
                    <td>Kép:</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Kiemelt:</td>
                    <td><input type="radio" name="kiemelt" value="Igen"> Igen <input type="radio" name="kiemelt"
                            value="Nem"> Nem</td>
                </tr>
                <tr>
                    <td>Aktív:</td>
                    <td><input type="radio" name="aktív" value="Igen"> Igen <input type="radio" name="aktív" value="Nem"> Nem</td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Hozzáadás" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php

        //Gombnyomás lekezelése
        if (isset($_POST['submit'])) {

            //Adatok lekérdezése a form-ból
            $cím = $_POST['cím'];

            //Radio gombok lekérése (melyik gomb van pipálva)
            if (isset($_POST['kiemelt'])) {
                //Érték lekérése
                $kiemelt = $_POST['kiemelt'];
            } else {
                $kiemelt = "Nem";
            }

            if (isset($_POST['aktív'])) {
                //Érték lekérése
                $aktív = $_POST['aktív'];
            } else {
                $aktív = "Nem";
            }

            //Van-e kép feltöltve
        

            if (isset($_FILES['image']['type'])) {
                
                //Kép feltöltése
                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {

                    //Kiterjesztés lekérése
                    $ext = end(explode('.', $image_name));

                    /*if(file_exists('../képek/kategória'.$_FILES['image']['name'])){
                        $_SESSION['img_already_exist'] = "<div class='error'>Létezik már kategória ilyen képpel!</div>";
                        header('location:' . HOME_URL . 'admin/category-hozzaad.php');
                        die();
                    } else {*/

                        //Példa: Kategória_123.jpg

                        $image_name = "Kategória_" . rand(000, 999) . '.' . $ext;
                        
                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = '../képek/kategória/' . $image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);
                    
                    //Sikeres-e a feltöltés
                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='error'>Kép Feltöltése Sikertelen!</div>";
                        header('location:' . HOME_URL . 'admin/category-hozzaad.php');
                        //Folyamat leállítása, ha nem sikerült képet feltölteni akkor ne kerüljön semmilyen adat az adatbázisba
                        die();
                    }
                }

            } else {

                //Ha nincs mit feltölteni akkor üresen hagyja
                $kép_név = "";

            }




            //SQL parancs -> Kategória beszúrása az adatbáziba
            $sql = "INSERT INTO kategória SET 
                cím ='$cím',
                kép_név ='$image_name',
                kiemelt='$kiemelt',
                aktív='$aktív'
            ";

            $er = mysqli_query($kapcs, $sql);

            //Sikeres volt-e a hozzáadás
            if ($er == true) {
                //Sikeres
                $_SESSION['add'] = "<div class='success'>Kategória Sikeresen Hozzáadva!</div>";
                header('location:' . HOME_URL . 'admin/category-kezeles.php');
            } else {
                //Sikertelen
                $_SESSION['add'] = "<div class='error'>Kategória Hozzáadása Sikertelen!</div>";
                header('location:' . HOME_URL . 'admin/category-kezeles.php');
            }


        }
        ?>


    </div>
</div>

<?php include('partials/footer.php') ?>