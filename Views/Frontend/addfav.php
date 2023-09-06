<?php 
include '../../Controller/FavorisC.php';
require_once '../../model/Favoris.php';
session_start();
$favC = new FavorisC();

if (isset($_GET['id'])) {
    $favoris = new Favoris(1, $_GET['id'], $_SESSION['id']);
    $favC->ajouter($favoris);
    header("Location: Favoris.php");
  }
  ?>