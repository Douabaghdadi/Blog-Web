<?php
    class User
    {
		public $id;
        public $login;
        public $nom;
        public $prenom;
        public $email;
        public $date_n;
		public $img;
		public $mdp;
		public $date_creation;
        public $genre;
		public $role;

    

        public function __construct(int $id,string $nom,string $prenom, string $login,string $email,DateTime $ddn,string $img,string $mdp, DateTime $date_creation,string $genre,string $role )
    {
        $this->id = $id;
        $this->login = $login;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->ddn=$ddn;
        $this->img=$img;
        $this->mdp=$mdp;
        $this->date_creation=$date_creation;
        $this->genre=$genre;
        $this->role=$role;
    }

    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id=$id;
    }
    public function getLogin() : string 
    {
        return $this->login;
    }
    public function setLogin(string $login )
    {
        $this->login=$login;
    }
    public function getEmail() : string 
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email=$email;
    }
    public function getDdn(): DateTime
    {
        return $this->ddn;
    }

    public function setDdn(DateTime $ddn)
    {
        $this->ddn=$ddn;
    }
    public function getImg() : string 
    {
        return $this->img;
    }
    public function setImg(string $img)
    {
        $this->img=$img;
    }
    public function getMdp() : string 
    {
        return $this->mdp;
    }
    public function setMdp(string $pswd)
    {
        $this->mdp=$pswd;
    }
    public function getDate_creation() : DateTime 
    {
        return $this->date_creation;
    }
    public function setDate_creation(DateTime $dd)
    {
        $this->date_creation=$dd;
    }
    public function getRole() : string 
    {
        return $this->role;
    }
    public function setRole(string $role)
    {
        $this->role=$role;
    }
    public function getGenre() : string 
    {
        return $this->genre;
    }
    public function setGenre(string $g)
    {
        $this->genre=$g;
    }
    public function getNom() : string 
    {
        return $this->nom;
    }
    public function setNom(string $role)
    {
        $this->nom=$role;
    }
    public function getPrenom() : string 
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom)
    {
        $this->prenom=$prenom;
    }

	}
   
?>