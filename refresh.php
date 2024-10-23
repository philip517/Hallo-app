<?php
session_start();
 unset($_SESSION['msg']);
if(isset($_SESSION['website_id'])){
    unset($_SESSION['website_id']);
    unset($_SESSION['msg']);
    unset($_SESSION['data']);

    header("Location:home.php");

}else{
    header("Location:home.php");
    
}

?>