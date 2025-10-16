<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 7 : Boucles"; //Mettre le nom du titre de la page que vous voulez
?>

<?php
//"Boucle exo7";
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) { 
        echo $i * $j;
        if ($j < 5) {
            echo " ";
        }
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
