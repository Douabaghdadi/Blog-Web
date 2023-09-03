<?php 
require_once '..\..\config.php';
require_once '..\..\Model\Commentaire.php';

class CommentaireC
{

    function afficherComment()
        {
            $requete = "select * from Commentaire";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function AfficherCommentByArticle($id)
        {
            $requete = "select * from Commentaire WHERE id_article=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$id
                    ]
                );
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function totalcomment($postId) {
            $query = "SELECT COUNT(*) as comment_count FROM Commentaire WHERE id_article = :postId";
            $config = config::getConnexion();
            try {
                $stmt = $config->prepare($query);
                $stmt->execute([
                    'postId' => $postId
                ]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['comment_count'];
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        function getCommentById($id)
        {
            $requete = "select * from Commentaire where id=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$id
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function AjouterComment($comment)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO Commentaire
                (contenu,id_user,id_article,date )
                VALUES
                (:contenu,:idu,:ida,:date)
                ');
                
               $rs=$querry->execute([
                    
                    'contenu'=>$comment->getContenu(),
                    'idu'=>$comment->getIduser(),
                    'ida'=>$comment->getIdarticle(),
                    'date'=>$comment->getDate()->format('Y-m-d H:i:s')
                    
                ]);
                if ($rs) {
                    echo "Comment Created";
                }
                else {
                    echo "ERROR";
                }
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        
        function ModifierComment($comment)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE Commentaire SET
                contenu=:contenu,id_user=:iduser,id_article=:idposte,date=:date
                where id=:id');
                
                $querry->execute([
                    'id'=>$comment->getId(),
                    'contenu'=>$comment->getContenu(),
                    'iduser'=>$comment->getIduser(),
                    'idposte'=>$comment->getIdarticle(),
                    'date'=>$comment->getDate()->format('Y-m-d H:i:s')

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function SupprimerComment($id)
        {
            $sql="DELETE FROM Commentaire WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
        }

        function searchform($search)
        {
            $requete = "select * from Commentaire  WHERE contenu LIKE '%$search%'";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
} 