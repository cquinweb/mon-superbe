<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 2 : Conditions"; //Mettre le nom du titre de la page que vous voulez
?>

<P> Exercice 2 dans la série Les conditions</P>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
