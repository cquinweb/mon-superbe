<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 1 : Variables"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<h2>exercise 1 </h2>

<?php
$nom = "jean";
echo "<p>Le nom est : $nom</p>";
?>

<hr>

<h2>exercise 2 </h2>

<?php
$nombre1 = 15;
$nombre2 = 10;
$somme =  $nombre1 + $nombre2;
echo "<p>La somme de $nombre1 + $nombre2 est : $somme</p>";
?>

<hr>

<h2>exercise 3 </h2>

<?php
$prenom = "Marie";
$nomFamille = "Dupont";
$nomComplet = $prenom . " " . $nomFamille;
echo "<p>Le nom complet est : $nomComplet</p>";
?>

<hr>

<h2>exercise 4 </h2>

<?php
$age = 17;
echo "<p>Age initial : $age</p>";

$age = 23;
echo "<p>Age modifie : $age</p>";
?>

<hr>

<h2>exercise 5 </h2>
<?php
    $a = 3;
    $b = 5;
    $c = 7;
    echo "<p>";
        echo "************ AVANT PERMUTATION ************<br />";
        echo "A : ". $a ."<br />";
        echo "B : ". $b ."<br />";
        echo "C : ". $c;
    echo "</p>";

    $tmp=$a;
    $a=$b;
    $b=$c;
    $c=$tmp;

    echo "<p>";
        echo "************ APRES PERMUTATION ************<br />";
        echo "A : ". $a ."<br />";
        echo "B : ". $b ."<br />";
        echo "C : ". $c;
    echo "</p>";
?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
