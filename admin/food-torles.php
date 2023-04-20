<?php

include('../config/konstansok.php');

if(isset($_GET['id']) && isset($_GET['kép_név'])){

    $id = $_GET['id'];
    $image_name = $_GET['kép_név'];
    if($image_name != ""){
         //Elérhető
         $path = "../képek/food/".$image_name;

         //Törlés
         $remove = unlink($path);
 
         //Kép sikertelen törlése
         if($remove==false){
 
             $_SESSION['remove'] = "<div class='error'>A Kép Törlése Sikertelen !</div>";
 
             //Redirect
             header('location:'.HOME_URL.'admin/food-kezeles.php');
 
             die();
 
         }
    }

     $sql = "DELETE FROM étel WHERE id=$id";

     $er = mysqli_query($kapcs,$sql);

     if($er == true){
        $_SESSION['delete'] ="<div class='success'>Sikeres Eltávolítás!</div>";
        header("location:".HOME_URL."admin/food-kezeles.php");
     }else{
        $_SESSION['delete'] ="<div class='error'>Sikerestelen Eltávolítás!</div>";
        header("location:".HOME_URL."admin/food-kezeles.php");
     }


}else{
    $_SESSION['unauthorized-access'] = "<div class='error'>Jogosulatlan hozzáférés!</div>";
    header('location:' . HOME_URL . "admin/food-kezeles.php");
}


?>