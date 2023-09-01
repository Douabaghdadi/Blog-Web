<?php 


include '../../Controller/CommentaireC.php';

require_once '../../model/Commentaire.php';



$CommentC = new CommentaireC();
if(isset($_GET['id']))
{
    $com = $CommentC->getCommentById($_GET['id']);
    $CommentC->SupprimerComment($_GET['id']);
    header("Location: postdetail.php?id={$com['id_article']}");
}
    
    

?> 