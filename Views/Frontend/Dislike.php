<?php 
include '../../Controller/LikesC.php';
require_once '../../model/Likes.php';
session_start();
$LikesC = new LikesC();

if (isset($_GET['id'])) {
    
    $LikesC->Dislike($_GET['id'],$_SESSION['id']);
    header("Location: indexLecteur.php");
  }
  ?>