<?php
require_once __DIR__ . "/MonPDO.class.php";
require_once __DIR__ . "/Animal.class.php";

class AnimalDAO {
    public static function getAnimauxBD(){
        $pdo = MonPDO::getPDO();
        $sql = "SELECT IdAnimal, Nom, Age, Sexe, NumType 
                FROM animal
                ORDER BY IdAnimal";

        $stmt = $pdo->query($sql);

        $animaux = [];
        while($row = $stmt->fetch()){
            $animaux [] = new Animal(
                $row["IdAnimal"],
                $row["Nom"],
                $row["Age"],
                $row["Sexe"],
                $row["NumType"]
            );
        }
        return $animaux;
    }
    public static function getTypeAnimal($idAnimal){
        $pdo = MonPDO::getPDO();
        $sql = "SELECT t.Libelle
                FROM animal a
                INNER JOIN type t ON t.IdType = a.NumType
                WHERE a.IdAnimal = :id";
        $stmt = $pdo->prepare($sql);
        $stmt ->execute(["id" => $idAnimal]);

        $row = $stmt->fetch();
        return $row ? $row["Libelle"] : "";
    }

    public static function getImagesAnimal($idAnimal){
        $pdo = MonPDO::getPDO();
        $sql = "SELECT i.Url
                FROM image_animal ia
                JOIN image i ON i.IdImage = ia.NumImage
                WHERE ia.NumAnimal = :id
                ORDER BY i.IdImage";

        $stmt = $pdo->prepare($sql);
        $stmt ->execute(["id" => $idAnimal]);

        $images = [];
        while($row = $stmt->fetch()){
            $images[] = $row["Url"];
        }
        return $images;
    }
}