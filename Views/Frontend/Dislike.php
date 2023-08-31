<?php 
include '../../Controller/LikesC.php';
require_once '../../model/Likes.php';
$LikesC = new LikesC();

if (isset($_GET['id'])) {
    
    $LikesC->Dislike($_GET['id'],1);
    header("Location: indexLecteur.php");
  }
  ?>