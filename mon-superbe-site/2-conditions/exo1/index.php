<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 1 : Conditions Ternaires"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
    $nom = "Marie";
    $age = 30;
    $homme = false;

    $nom2 = "Pierre";
    $age2 = 32;
    $homme2 = true;
    
    echo "<p>";
        echo $nom ." à ". $age ." ans";
        $sexeTxt = ($homme) ? "un homme" : "une femme";
        echo " et c'est ". $sexeTxt;
    echo "</p>";
?>
<p>
    <?= $nom2 ?> à <?= $age2 ?> ans et c'est <?= ($homme2) ? "un homme" : "une femme" ?>
</p>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
