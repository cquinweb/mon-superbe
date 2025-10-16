<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 2 : Boucles"; //Mettre le nom du titre de la page que vous voulez
?>

<?=
//"Boucle exo2";

$n = 10;
while ($n >= 1) {
    echo $n . " ";
    $n--;
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
