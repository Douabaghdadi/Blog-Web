<?php 
include '../../Controller/FavorisC.php';
require_once '../../model/Favoris.php';
session_start();
$favC = new FavorisC();

if (isset($_GET['id'])) {
    
    $favC->Supprimerfavoris($_GET['id'],$_SESSION['id']);
    header("Location: favoris.php");
  }
  ?>