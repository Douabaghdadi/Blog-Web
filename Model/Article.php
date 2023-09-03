<?php 
class Article 
{
    public $id;
    public $categorie;
    public $titre;
    public $description;
    public $date_p;
    public $img;
    public $id_user;
    public $is_accepted;

    public function __construct(int $id,string $categorie,string $titre, string $description,DateTime $date_p,string $img,int $id_user,int $is_accepted )
    {
        $this->id = $id;
        $this->categorie = $categorie;
        $this->titre=$titre;
        $this->description=$description;
        $this->date_p=$date_p;
        $this->img=$img;
        $this->id_user=$id_user;
        $this->is_accpeted=$is_accepted;
      
    }

    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id=$id;
    }
    public function getIs_accepted() : int
    {
        return $this->is_accpeted;
    }
    public function setIs_accepted(int $x)
    {
        $this->is_accpeted=$x;
    }
    public function getCategorie() : string
    {
        return $this->categorie;
    }
    public function setCategorie(string $categ) : void 
    {
        $this->categorie=$categ;
    }

    public function getTitre() : string 
    {
        return $this->titre;
    }
    public function setTitre(string $titre) : void 
    {
        $this->titre=$titre;
    }
    public function getDescription() : string 
    {
        return $this->description;
    }
    public function setDescription(string $desc) : void 
    {
        $this->description=$desc;
    }
    public function getDate_p() : DateTime
    {
        return $this->date_p;
    }
    public function setDate_p(DateTime $date) : void 
    {
        $this->date_p=$date;
    }
    public function getImg() : string 
    {
        return $this->img;
    }
    public function setImg(string $img) : void 
    {
        $this->img=$img;
    }
   
    public function getId_user() : int 
    {
        return $this->id_user;
    }
    public function setId_user(int $id) : void 
    {
        $this->id_user=$id;
    }
}