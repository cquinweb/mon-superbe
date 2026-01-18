<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 2 : Conditions"; //Mettre le nom du titre de la page que vous voulez
?>

<P> LES CONDITIONS : switch</P>
<?php
$vers = 6;

switch ($vers) {
    case 1:
        echo "<p>Une strophe formée de deux vers est appelée <strong>distique</strong>.</p>";
        break;
    case 2:
        echo "<p>Une strophe formée de trois vers est appelée <strong>tercet</strong>.</p>";
        break;
    case 3:
        echo "<p>Une strophe formée de quatre vers est appelée <strong>quatrain</strong>.</p>";
        break;
    case 4:
        echo "<p>Une strophe formée de cinq vers est appelée <strong>quintil</strong>.</p>";
        break;
    case 5:
        echo "<p>Une strophe formée de six vers est appelée <strong>sizain</strong>.</p>";
        break;
    case 6:
        echo "<p>Une strophe formée de sept vers est appelée <strong>septain</strong>.</p>";
        break;
    case 7:
        echo "<p>Une strophe formée de huit vers est appelée <strong>huitain</strong>.</p>";
        break;
    case 8:
        echo "<p>Une strophe formée de neuf vers est appelée <strong>neuvain</strong>.</p>";
        break;
    case 9:
        echo "<p>Une strophe formée de dix vers est appelée <strong>dizain</strong>.</p>";
        break;
    case 10:
        echo "<p>Une strophe formée de once vers est appelée <strong>onzain</strong>.</p>";
        break;
    case 11:
        echo "<p>Une strophe formée de douce vers est appelée <strong>douzain</strong>.</p>";
        break;
    default:
        echo "<p>choisis un nombre de vers entre 1 et 11</p>";


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
