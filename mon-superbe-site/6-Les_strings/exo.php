<?php ob_start(); //NE PAS MODIFIER
$titre = "Exo 1 : Les Strings" ; //Mettre le nom du titre de la page que vous voulez
?>

    <!-- mettre ici le code -->

//En utilisant la fonction strlen() écrivez une boucle qui affiche chaque lettre
//d’une chaine de caractère ‘ str’ sur une ligne différente.
//$str=Bonjour et bienvenue au cours de programmation .

<?php

$str = "Bonjour et bienvenue au cours de programmation";

for ($i = 0; $i < strlen($str); $i++) {
    echo $str[$i];
    echo "<br>";
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

