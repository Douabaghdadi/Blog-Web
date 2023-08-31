<?php 
include '../../Controller/LikesC.php';
require_once '../../model/Likes.php';
$LikesC = new LikesC();

if (isset($_GET['id'])) {
    $likes = new Likes(1, $_GET['id'], 1);
    $LikesC->Like($likes);
    header("Location: indexLecteur.php");
  }
  ?>
  