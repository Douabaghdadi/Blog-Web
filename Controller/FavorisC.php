<?php

    require_once '..\..\config.php';
    require_once '..\..\Model\Favoris.php';
   
    class FavorisC {

        function ajouter($f)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO favoris
                (id_user,id_article )
                VALUES
                (:iduser,:ida)
                ');
                
               $rs=$querry->execute([
                    
                    'ida'=>$f->getIdarticle(),
                    'iduser'=>$f->getIduser()
               
                ]);

                if ($rs) {
                    echo " article favoris";
                }
                else {
                    echo "ERROR";
                }
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }


        function getFavoris($int)
{
            $requete = "select * from favoris where id_user=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(['id'=>$int]);
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
    }


        function Supprimerfavoris($id,$iduser)
        {
            $sql="DELETE FROM favoris WHERE id_article= :id AND id_user=:iduser";
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

        function Check($iduser,$idfilm) : int
        {

           
$sql = "SELECT COUNT(*) as total FROM favoris WHERE id_article = $idfilm AND id_user = $iduser";
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