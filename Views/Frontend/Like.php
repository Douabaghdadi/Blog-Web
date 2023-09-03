<?php 
include '../../Controller/LikesC.php';
require_once '../../model/Likes.php';
session_start();
$LikesC = new LikesC();

if (isset($_GET['id'])) {
    $likes = new Likes(1, $_GET['id'], $_SESSION['id']);
    $LikesC->Like($likes);
    header("Location: indexLecteur.php");
  }
  ?>
  