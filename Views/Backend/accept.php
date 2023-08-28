<?php
session_start();
    require '../../Controller/ArticleC.php';
if (isset($_GET['id'])) {
    $artC = new ArticleC();
    $artC->Approuver($_GET['id']);
    
   header('Location:indexArticle.php');
   echo 'sudd';
} else {
    echo 'oooooooooooooooooo';
}
    
?>