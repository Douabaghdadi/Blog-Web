<?php
   include '../../Controller/ArticleC.php';

   require_once '../../model/Article.php';
   session_start();
if (isset($_GET['id'])) {
    $articleC = new ArticleC();
   
    $articleC->SupprimerArticle($_GET['id']);
  
   header('Location:Mesarticles.php');
} else {
    echo 'Suppression échoué';
}
    
?>