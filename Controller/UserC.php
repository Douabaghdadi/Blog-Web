<?php
require_once '..\..\config.php';
require_once '..\..\Model\User.php';

class UserC
{

    public function listUser()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function getuserbyID($id)
    {
        $requete = "select * from user where id =:id";
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

    function deleteUser($ide)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function register($User)
    {
        $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO user
                (nom,prenom,email,img,login,date_n,mdp,genre,date_c,role)
                VALUES
                (:nom,:prenom,:email,:img,:login,:date_c,:mdp,:genre,:date_c,:role)
                ');
                
               $rs=$querry->execute([
                'nom'  =>$User->getNom(),
                'prenom'=>$User->getPrenom(),
                'login' => $User->getLogin(),
                'email' => $User->getEmail(),
                'date_n' => $User->getDdn()->format('Y-m-d'),
                'img' => $User->getImg(),
                'mdp' => $User->getMdp(),
                'date_c'=>$User->getDate_creation()->format('Y-m-d H:i:s'),
                'genre'=>$User->getGenre(),
                'role'=>$User->getRole()
                   
                    
                   
                ]);
                if ($rs) {
                    echo "User Created";
                }
                else {
                    echo "ERROR";
                }
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }


    function showUser($id)
    {
        $sql = "SELECT * from user where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateUser($User)
    {
        $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE user SET
                nom=:nom,prenom=:prenom,email=:email,img=:img,login=:login,date_n=:date_n,mdp=:mdp,genre=:genre,date_c=:date_c,role=:role
                where id=:id');
                
                $querry->execute([
                    'id'=>$User->getId(),
                    'nom'  =>$User->getNom(),
                'prenom'=>$User->getPrenom(),
                'login' => $User->getLogin(),
                'email' => $User->getEmail(),
                'date_n' => $User->getDdn()->format('Y-m-d'),
                'img' => $User->getImg(),
                'mdp' => $User->getMdp(),
                'date_c'=>$User->getDate_creation()->format('Y-m-d H:i:s'),
                'genre'=>$User->getGenre(),
                'role'=>$User->getRole()
                   
                    

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
            
    }
    function getUserByEmail($email)
    {
        $requete = "select * from user where email =:email";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'email'=>$email
                ]
            );
            $result = $querry->fetch();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
    function connexionUser($email,$password)
    {

        $db=config::getConnexion();
        $sql="SELECT * FROM user WHERE email='". $email ."' AND mdp='". $password. "'";
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $count=$query->rowCount();
            $result = $query->fetch(PDO::FETCH_OBJ);
            if($count==0)
            {
                $message="verifier donnees login";
            }
            else{
                
                
                $x=$query->fetch();
                $message=$x['email'];
                $_SESSION['id'] = $result->id ;
                $_SESSION['nom']=$result->nom;
                $_SESSION['prenom']=$result->prenom;
                $_SESSION['login'] = $result->login ;
                $_SESSION['img'] = $result->img ;
                $_SESSION['date_n'] = $result->date_n ;
                $_SESSION['mdp'] = $result->mdp ;
                $_SESSION['email'] = $result->email ;
                $_SESSION['role']=$result->role;
                $_SESSION['genre']=$result->genre;
					echo "$message";

            }


        }
        catch (Exception $e)
				{
					$message= " ".$e->getMessage();
				}

			return $message;


    }
    function Recherche($search)
        {
            $requete = "select * from user  WHERE login LIKE '%$search%'";
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