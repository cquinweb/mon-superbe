<?php ob_start(); //NE PAS MODIFIER
$titre = "Exo 4 : Les Strings" ; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code

Transformez une chaîne écrite dans des casses différentes afin que chaque mot
ait une initiale en majuscule.
-->


<?php

$str = "hola a todos";
$str_majuscule = ucwords($str);

echo $str_majuscule;

?>






<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>

