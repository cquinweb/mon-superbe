<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 6 : Boucles"; //Mettre le nom du titre de la page que vous voulez
?>

<?php
//"Boucle exo6";

$lineas = 10;


for ($i = $lineas; $i >= 1; $i--) {
   
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
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
