<?php ob_start(); //NE PAS MODIFIER
$titre = "Exo 2 : Les Strings" ; //Mettre le nom du titre de la page que vous voulez
?>

    <!-- mettre ici le code

    À partir de deux chaînes quelconques contenues dans des variables, effectuez
    une comparaison entre elles pour pouvoir les afficher en ordre alphabétique
    naturel.
    Nous utilisons la fonction strtolower() avant d’opérer la comparaison, sinon
    tous les caractères de A à Z sont avant les caractères a à z.
    Str1= ‘Etoiles de mer’ / en miniscule
    Str2=’chat et la souris’ / en miniscule-->

<?php

$str1 = "Etoiles de mer";
$str2 = "chat et la souris";

$str1_min = strtolower($str1);
$str2_min = strtolower($str2);

if ($str1_min < $str2_min) {
    echo $str1 . "<br>";
    echo $str2;
} else {
    echo $str2 . "<br>";
    echo $str1;
}
?>






<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>
