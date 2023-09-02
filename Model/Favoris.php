<?php 
class Favoris
{
private $id;
private $idarticle;
private $iduser;


function __construct(int $id,int $idarticle,int $iduser){

    $this->id=$id;

    $this->iduser=$iduser;
    $this->idarticle=$idarticle;
 

} 


public function getIdarticle() : int 
{
    return $this->idarticle;
}
public function setIdarticle(int $id) 
{
    $this->idarticle=$id;
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