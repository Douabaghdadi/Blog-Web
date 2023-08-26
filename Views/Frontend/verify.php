<?php
session_start();
include "../../Controller/UserC.php";
include_once '../../Model/User.php';



  $clientC = new UserC();
  $message="";
if (isset($_POST["email"])&&isset($_POST["password"]))
   { 
    if (!empty($_POST["email"])&&
    !empty($_POST["password"])
       )
       { 
           $message=$clientC->connexionUser($_POST["email"],$_POST["password"]);
          
          
           echo $message;
           if ($message!='verifier donnees login')
           {
            if($_SESSION['role']=="Admin")
            header('Location:../Backend/indexAdmin.php');
            else if($_SESSION['role']=='Auteur')
            {
              header('Location:indexAuteur.php');
            }
            else  header('Location:indexLecteur.php');
          
           }
               else
                 {
               $message='verifier donnees login';
               echo $message;
               
               
                 }


       }
       else
      { 
        $message="Missing information";
       echo $message;}
}
?>