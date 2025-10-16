<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 1 : Boucles"; //Mettre le nom du titre de la page que vous voulez
?>

<?php

for ($i = 4; $i <= 12; $i++) {
    echo $i . " ";
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
