<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 3 : Boucles"; //Mettre le nom du titre de la page que vous voulez
?>

<?php
//"Boucle exo3";


$nombre = 3;
$fact = 1;
$details = "";


for ($i = $nombre; $i >= 1; $i--) {
    $fact *= $i;

   
    $details .= $i;
    if ($i > 1) {
        $details .= "*";
    }
}

echo "La factorielle de $nombre est : $details = $fact";
?>







<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
