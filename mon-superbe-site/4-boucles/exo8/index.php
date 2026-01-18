<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 8: Boucles"; //Mettre le nom du titre de la page que vous voulez
?>

<?php
//"Boucle exo8";
$notes =  [15, 18, 17, 10.5, 14.25, 19, 20, 11, 10, 8 ];

echo "las notas son: ";
foreach ($notes as $note) {
    echo $note . " ";
}
echo "<br>";

$moyenne = array_sum($notes) / count($notes);
echo "La moyenne des notes est : " . $moyenne . "<br>";
echo "<br>";

$compteur = 0;
foreach ($notes as $note) {
    if ($note >= 10) {
        $compteur++;
    }
}
echo "Nombre de notes supérieures ou égales à 10 : " . $compteur . "<br>";

if (in_array(20, $notes)) {
    echo "La note 20 est présente dans le tableau.<br>";
} else {
    echo "La note 20 n'est pas présente dans le tableau.<br>";
}

$meilleure = max($notes);
echo "La meilleure note est : " . $meilleure . "<br>";

$mauvaise = min($notes);
echo "La mauvaise note est : " . $mauvaise . "<br>";
?>







<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
