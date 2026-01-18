<?php
class Animal{

private $idAnimal;
private $nom;
private $age;
private $sexe;
private $numType;

public function __construct($idAnimal, $nom, $age, $sexe, $numType){
    $this->idAnimal = $idAnimal;
    $this->nom = $nom;
    $this->age = $age;
    $this->sexe = $sexe;
    $this->numType = $numType;
}
    public function getIdAnimal(){ return $this->idAnimal;}
    public function getNom(){ return $this->nom;}
    public function getAge(){ return $this->age;}
    public function getSexe(){ return $this->sexe;}
    public function getNumType(){ return $this->numType;}

    public function setIdAnimal($idAnimal){ $this->idAnimal = $idAnimal;}
    public function setNom($nom){ $this->nom = $nom;}
    public function setAge($age){ $this->age = $age;}
    public function setSexe($sexe){ $this->sexe = $sexe;}
    public function setNumType($numType){ $this->numType = $numType;}


}
