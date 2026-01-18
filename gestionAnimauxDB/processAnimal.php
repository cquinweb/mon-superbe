<?php
require_once __DIR__ . "/AnimalDAO.class.php";

$animaux = AnimalDAO::getAnimauxBD();

$typesByAnimal = [];
$imagesByAnimal = [];

foreach ($animaux as $a) {
    $id = $a->getIdAnimal();
    $typesByAnimal[$id] = AnimalDAO::getTypeAnimal($id);
    $imagesByAnimal[$id] = AnimalDAO::getImagesAnimal($id);
}