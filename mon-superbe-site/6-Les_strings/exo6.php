<?php ob_start(); //NE PAS MODIFIER
$titre = "Exo 6 : Les Strings" ; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code
Soit l’adresse mail suivante :
d.pascal2012@mail.com
Ecrivez un programme PHP pour :
Récupérer le nom de l’utilisateur
Récupérer l’index du caractère @
Récupérer le nom du domaine
Vérifier s’il s’agit d’une adresse gamil (c-à-d que le nom du domaine égal à
gmail.com) ou pas  -->


<?php
$email = "d.pascal2012@mail.com";

//Récupérer le nom de l’utilisateur
$position_at = strpos($email, "@");
$nom_utilisateur = substr($email, 0,$position_at);
echo $nom_utilisateur;

//Récupérer l’index du caractère @
echo "<br>";
echo "Position du @: $position_at<br>";
//Récupérer le nom du domaine
echo "<br>";
$nom_domaine = substr($email, $position_at + 1);
echo "3. Nom de domaine: $nom_domaine<br><br>";
//Vérifier s’il s’agit d’une adresse gamil
if ($nom_domaine == "gmail.com") {
    echo "4. C'est une adresse Gmail <br>";
} else {
    echo "4. Ce n'est PAS une adresse Gmail ✗<br>";
    echo "   (Le domaine est: $nom_domaine)<br>";
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

