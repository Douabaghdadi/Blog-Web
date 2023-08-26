<?php

    require_once '..\..\config.php';
    require_once '..\..\Model\Note.php';
   
    class NoteC {

        
        

        

        

        function Noter($note)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO note
                (note,id_article,id_user )
                VALUES
                (:note,:ida,:iduser)
                ');
                
               $rs=$querry->execute([
                    
                    'note'=>$note->getNote(),
                    'ida'=>$note->getIdarticle(),
                    'iduser'=>$note->getIduser()
                    
                    
                    
                   
                ]);
                if ($rs) {
                    echo "U Noted this movie";
                }
                else {
                    echo "ERROR";
                }
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function getNotes($id)
{
    $config = config::getConnexion();
    try {
        $query = $config->prepare('SELECT AVG(note) AS average_note FROM note WHERE id_article = :id');
        $query->execute(['id' => $id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $average_note = number_format($result['average_note'], 1);
        return $average_note;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

        function SupprimerNote($id,$iduser)
        {
            $sql="DELETE FROM note WHERE id_article= :id AND id_user=:iduser";
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

        function CheckNote($iduser,$idfilm) : int
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
$sql = "SELECT COUNT(*) as total FROM Note WHERE id_article = $idfilm AND id_user = $iduser";

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