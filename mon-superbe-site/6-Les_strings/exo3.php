<?php ob_start(); //NE PAS MODIFIER
$titre = "Exo 3 : Les Strings" ; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code

Dans la chaîne suivante :
‘’ PHP 8 \n est meilleur \n que ASP \n et JSP \n réunis’’
Remplacez les caractères \n par <br /> en utilisant la fonction str_replace().
On obtient le résultat suivant: PHP 5 est meilleur que ASP et JSP réunis-->


<?php

$str = "PHP 8 \n est meilleur \n que ASP \n et JSP \n réunis";

$str_nueva = str_replace("\n", "<br>", $str);

echo $str_nueva;

?>






<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>

