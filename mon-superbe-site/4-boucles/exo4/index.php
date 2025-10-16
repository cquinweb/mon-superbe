<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 4 : Boucles"; //Mettre le nom du titre de la page que vous voulez
?>

<?php
//"Boucle exo4";
$talla = 10;

for ($i = 1; $i <= $talla; $i++) {
  for ($j = 1; $j <= 10; $j++){
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
