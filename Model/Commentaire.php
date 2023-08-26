<?php 

class Commentaire 
{
private $id;
private $contenu;
private $iduser;
private $idarticle;
private $date;

function __construct(int $id,string $contenu,int $iduser,int $idarticle,DateTime $date){

    $this->id=$id;
    $this->contenu=$contenu;
    $this->iduser=$iduser;
    $this->idarticle=$idarticle;
    $this->date=$date;

} 
public function getDate() : DateTime
{
    return $this->date;
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
public function getContenu() : string
{
    return $this->contenu;
}

public function getIduser() : int 
{
    return $this->iduser;
}
function setId(string $id){
    $this->id=$id;
}
function setContenu(string $contenu){
    $this->contenu=$contenu;
}

function setIduser(int $iduser)
{
    $this->iduser=$iduser;
}

}