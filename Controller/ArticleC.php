<?php

require_once '..\..\config.php';
require_once '..\..\Model\Article.php';

class ArticleC 
{
    function AfficherArticle()
    {
        $requete = "select * from article";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute();
            //$result = $querry->fetchAll(PDO::FETCH_COLUMN, 1);
            $result = $querry->fetchAll();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
    function AfficherParCateg($int)
        {
            $requete = "select * from article where categorie=:categ";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(['categ'=>$int]);
                //$result = $querry->fetchAll(PDO::FETCH_COLUMN, 1);
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function AfficherParUser($int)
        {
            $requete = "select * from article where id_user=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(['id'=>$int]);
                //$result = $querry->fetchAll(PDO::FETCH_COLUMN, 1);
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function getArticleById($id)
        {
            $requete = "select * from article where id=:id";
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
        function getArticleByTitre($title){
            $req = "select * from article where titre = :title";
            $config = config::getConnexion();
            try{
                $query = $config->prepare($req);
                $query->execute(['title'=>$title]);
                $result = $query->fetch();
                return $result;
            } catch(PDOException $th){
                $th->getMessage();
            }
        }

        function AjouterArticle($article)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO article
                (categorie, titre,description, date_p, img,id_user,is_accepted)
                VALUES
                (:categorie ,:titre ,:description ,:date_p ,:img ,:id_user,:is_accepted)
                ');
                $querry->execute([
                    'categorie'=>$article->getCategorie(),
                    'titre'=>$article->getTitre(),
                    'description'=>$article->getDescription(),
                    'date_p'=>$article->getDate_p()->format('Y-m-d H:i:s'),
                    'img'=>$article->getImg(),
                    'id_user'=>$article->getId_user(),
                    'is_accepted'=>$article->getIs_accepted()
                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function ModifierArticle($article)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE article SET
                categorie=:categorie,titre=:titre,description=:description,date_p=:date_p,img=:img,id_user=:id_user,is_accepted=:is_accepted
                where id=:id');
                
                $querry->execute([
                    'id'=>$article->getid(),
                    'categorie'=>$article->getCategorie(),
                    'titre'=>$article->getTitre(),
                    'description'=>$article->getDescription(),
                    'date_p'=>$article->getDate_p()->format('Y-m-d H:i:s'),
                    'img'=>$article->getImg(),
                    'id_user'=>$article->getId_user(),
                    'is_accepted'=>$article->getIs_accepted()

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function Approuver($id)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE article SET
                is_accepted=1
                where id=:id');
                
                $querry->execute([
                    'id'=>$id
                   

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function SupprimerArticle($id)
        {
            $sql="DELETE FROM article WHERE id= :id";
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
        function Recherche($search)
        {
            $requete = "select * from article  WHERE titre LIKE '%$search%'";
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