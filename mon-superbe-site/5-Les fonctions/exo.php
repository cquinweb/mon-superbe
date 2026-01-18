<?php ob_start(); //NE PAS MODIFIER
$titre = "Exo 1 : les fonctions"; //Mettre le nom du titre de la page que vous voulez
?>


// Exercice 7 (factorielle)
<?php
function factorielle($n) {
    if ($n < 0) return null;
    $fact = 1;
    for ($i = 1; $i <= $n; $i++){
    $fact *=$i;}
    return $fact;
}
?>
<hr>

// Exercice 8 tableau
<?php
function afficher($tab){
    foreach ($tab as $val){
        echo $val." ";

    }
    echo "<br><br>";
}
?>

<hr>

// Exercice 9
<?php
function moyenne($tab){
   if (count($tab) == 0)return null;
   $somme = 0;
   foreach ($tab as $val){
   $somme += $val;
   }
   return $somme / count($tab);
}
?>

<hr>

// Exercice 10
<?php
function maxTableau($tab){
   if (count($tab) == 0)return null;
   $max = $tab[0];
   foreach ($tab as $val){
   if ($val > $max) $max = $val;}
   return $max;
}
?>

<hr>
// Exercice 11
<?php
function mintableau($tab){
    if (count($tab) == 0)return null;
    $min = $tab[0];
    foreach ($tab as $val){
        if ($val < $min) $min = $val;
    }
    return $min;
}
?>

<hr>
// Exercice 12
<?php
function contient($tab, $nombre){
    foreach ($tab as $val){
        if ($val == $nombre) return true;
    }
    return false;
}
?>



/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>
