<?php
session_start();
if(isset($_SESSION['website_id'])){
    unset($_SESSION['website_id']);
    header("Location:home.php");

}else{
    header("Location:home.php");
    
}
// if(isset($_GET['id'])){
    
//     echo $_GET['id'];

// }else{
//     echo 'No id found';
// }

// if(isset($_GET['id'])){
//     $id=$_GET['id'];
// }

// $sql = "SELECT * FROM website WHERE id=$id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();

// // Fetch all results into an associative array
// $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// vardump($data);
?>