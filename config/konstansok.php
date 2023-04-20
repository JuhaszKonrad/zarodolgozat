
<?php 

//if( empty(session_id()) && !headers_sent()){
    session_start();
//}

define('HOME_URL','https://dark-implement.000webhostapp.com/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'id20557123_jkonrad');
define('DB_PASSWORD', 'DlM+/[ogN8jK=/A$');
define('DB_NAME', 'id20557123_database');

$kapcs = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($kapcs));
try{
$db_select = mysqli_select_db($kapcs,'id20557123_database');  

}catch(Exception $e){
    $error = $e->getMessage();
    echo $error;
} ?>