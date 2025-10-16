<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 1 : Variables"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
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
