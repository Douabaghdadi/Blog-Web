<?php

    require_once '..\..\config.php';
    require_once '..\..\Model\Likes.php';
   
    class LikesC {

        
        function GetLikesByArticle($id) : int
        {
            // Connect to your database
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
$sql = "SELECT COUNT(*) as total FROM Likes WHERE id_article = $id";

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
return $total;
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
$sql = "SELECT COUNT(*) as total FROM Likes WHERE id_article = $idposte AND id_user = $iduser";

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