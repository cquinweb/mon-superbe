<?php ob_start(); //NE PAS MODIFIER
$titre = "Exo 5 : Les Strings" ; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code
Soit la chaine de caractère suivante : ‘’ Les dunes changent sous l'action du
vent, mais le désert reste toujours le même. ’’
Ecrivez un programme PHP pour :
1. Déterminer la position du mot ‘désert’ dans la citation
2. Supprimer les espaces au début de la citation
3. Supprimer les espaces à la fin de la citation
4. Quelle est maintenant la position du mot ‘désert’ dans la citation
5. Récupérer la sous-chaine de caractère sous_chaine1: ‘’Les dunes
changent sous l'action du vent’’
6. Quelle est la taille de la sous-chaine sous_chaine1
7. Comptez le nombre de caractère ‘o’ dans le sou_chaine1
8. Récupérer la sous-chaine de caractère sous_chaine1: ‘’le désert reste
toujours le même’’
9. Quelle est la taille de la sous-chaine sous_chaine1
10.Comptez le nombre de caractère ‘e’ dans la sous_chaine2
11.Comptez le nombre de caractère ‘on’ toute la citation
12.Récupérer la taille de toute la citation
-->


<?php

$str = " Les dunes changent sous l'action du vent, mais le désert reste toujours le même. ";
echo "<h3>Citation originale:</h3>";
echo "'$str'<br><br>";

//Déterminer la position du mot ‘désert’ dans la citation
$position_desert = strpos($str, "désert");
echo "1. Position de 'désert': $position_desert<br>";

//Supprimer les espaces au début de la citation
$str = ltrim($str);
echo "2. '$str'<br>";

//Supprimer les espaces à la fin de la citation
$str = rtrim($str);
echo "3. '$str'<br>";

//Quelle est maintenant la position du mot ‘désert’ dans la citation
$position_desert_neuf = strpos($str, "désert");
echo "4. le neuf Position de 'désert': $position_desert_neuf<br>";

//Récupérer la sous-chaine de caractère sous_chaine1: ‘’Les dunes
//changent sous l'action du vent’’
$sous_chaine1 = substr($str, 0, 44);
echo "5. Sous-chaîne 1: '$sous_chaine1'<br>";

//Quelle est la taille de la sous-chaine sous_chaine1
$taille1 = strlen($sous_chaine1);
echo "6. Taille 1: caracteres '$taille1'<br>";

// Compter 'o' dans sous_chaine1
$compte_o = substr_count($sous_chaine1, "o");
echo "7. Nombre de 'o' dans sous-chaîne 1: $compte_o<br><br>";

// Extraire sous_chaine2: "le désert reste toujours le même"
$sous_chaine2 = substr($str, 52);  // Desde posición 52 hasta el final
echo "8. Sous-chaîne 2: '$sous_chaine2'<br>";

//Taille de sous_chaine2
$taille2 = strlen($sous_chaine2);
echo "9. Taille de sous-chaîne 2: $taille2 caractères<br>";

//Compter 'e' dans sous_chaine2
$compte_e = substr_count($sous_chaine2, "e");
echo "10. Nombre de 'e' dans sous-chaîne 2: $compte_e<br><br>";

//Compter 'on' dans toute la citation
$compte_on = substr_count($str, "on");
echo "11. Nombre de 'on' dans la citation: $compte_on<br>";

//Taille de toute la citation
$taille_total = strlen($str);
echo "12. Taille totale de la citation: $taille_total caractères<br>";


?>



<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>

