<?php

    require_once '..\..\config.php';
    require_once '..\..\Model\Likes.php';
   
    class LikesC {

        
        function GetLikesByArticle($id) : int
        {
            
$sql = "SELECT COUNT(*) as total FROM Likes WHERE id_article = $id";
$config = config::getConnexion();
            try {
                $stmt = $config->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $total= $result['total'];
                return $total;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        

        

        function Like($like)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO Likes
                (id_article,id_user )
                VALUES
                (:ida,:idu)
                ');
                
               $rs=$querry->execute([
                    
                    
                    'idu'=>$like->getIduser(),
                    'ida'=>$like->getId_article()
                
                ]);
                if ($rs) {
                    echo "U like this post";
                }
                else {
                    echo "ERROR";
                }
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        

        function Dislike($id,$iduser)
        {
            $sql="DELETE FROM Likes WHERE id_article= :id AND id_user=:iduser";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
            $req->bindValue(':iduser',$iduser);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
        }



        function CheckLike($iduser,$idposte) : int
        {

            
// Prepare the SQL statement to get the number of rows where idposte = id
$sql = "SELECT COUNT(*) as total FROM Likes WHERE id_article = $idposte AND id_user = $iduser";
$config = config::getConnexion();
            try {
                $stmt = $config->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $total= $result['total'];
                if ($total==0)
{
    return 0;
}
else

return 1;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        


    }