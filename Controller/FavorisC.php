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

            $servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for errors in connecting to the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the variable for the id you want to search for


// Prepare the SQL statement to get the number of rows where idposte = id
$sql = "SELECT COUNT(*) as total FROM favoris WHERE id_article = $idfilm AND id_user = $iduser";

// Execute the SQL statement and get the result
$result = $conn->query($sql);

// Check for errors in executing the SQL statement
if (!$result) {
    die("Error executing query: " . $conn->error);
}

// Get the number of rows where idposte = id from the result
$row = $result->fetch_assoc();
$total = $row['total'];



// Close the database connection
$conn->close();

if ($total==0)
{
    return 0;
}
else

return 1;

            
        }
        


    }