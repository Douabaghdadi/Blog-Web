<?php 
class Likes
{
private $id;
private $id_article;
private $iduser;


function __construct(int $id,int $id_article,int $iduser){

    $this->id=$id;
   
    $this->iduser=$iduser;
    $this->id_article=$id_article;
 

} 


public function getId_article() : int 
{
    return $this->id_article;
}
public function setId_article(int $id) 
{
    $this->id_article=$id;
}
public function getId() : int 
{
    return $this->id;
}


public function getIduser() : int 
{
    return $this->iduser;
}
function setId(string $id){
    $this->id=$id;
}


function setIduser(int $iduser)
{
    $this->iduser=$iduser;
}
}