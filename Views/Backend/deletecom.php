<?php
   include '../../Controller/CommentaireC.php';

   require_once '../../model/Commentaire.php';
   session_start();
if (isset($_GET['id'])) {
    $comC = new CommentaireC();
   
    $comC->SupprimerComment($_GET['id']);
  
   header('Location:indexArticle.php');
} else {
    echo 'Suppression échoué';
}
    
?>