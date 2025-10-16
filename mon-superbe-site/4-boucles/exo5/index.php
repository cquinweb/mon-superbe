<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 5 : Boucles"; //Mettre le nom du titre de la page que vous voulez
?>

<?php
//"Boucle exo5";


$talla = 10;

for ($i = 1; $i <= $talla; $i++) {
    echo  str_repeat(" ", $talla - $i);
    echo str_repeat("* ", $i);
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
