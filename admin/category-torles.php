<?php
    include('../config/konstansok.php');

    if(isset($_GET['id']) && isset($_GET['kép_név'])){

    $id = $_GET['id'];
    $kép_név = $_GET['kép_név'];

    //Kép törlése ha elérhető
    if($kép_név != ""){

        //Elérhető
        $path = "../képek/kategória/".$kép_név;

        //Törlés
        $remove = unlink($path);

        //Kép sikertelen törlése
        if($remove==false){

            $_SESSION['remove'] = "<div class='error'>A Kép Törlése Sikertelen !</div>";

            //Redirect
            header('location:'.HOME_URL.'admin/category-kezeles.php');

            die();

        }

    }

    //Adatok törlése az adatbázisból
    $sql = "DELETE from kategória WHERE id=$id ";
    $er = mysqli_query($kapcs,$sql);

    //Sikeres Törlés
    if($er == true){

        $_SESSION['delete'] = "<div class='success'>Kategória Törlése Sikeres!</div>";
        //Redirect
        header('location:'.HOME_URL.'admin/category-kezeles.php');

    }else{

        $_SESSION['delete'] = "<div class='error'>Kategória Törlése Sikertelen!</div>";
        //Redirect
        header('location:' . HOME_URL . 'admin/category-kezeles.php');

    }


    }else{

    header('location:' . HOME_URL . 'admin/category-kezeles.php');

    }

?>