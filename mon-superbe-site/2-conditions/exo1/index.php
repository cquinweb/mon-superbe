<?php ob_start(); //NE PAS MODIFIER 
$titre = "Exo 1 : Conditions Ternaires"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->

<h2> Exercise 1 :sexe</h2>
<?php
$sexe = "F";

if ($sexe == "M"){
    echo "<p>Vous etes un homme.</p>";

}else {
    echo "<p>Vous etes un femme.</p>";
}
?>

<hr>

<h2> Exercise 2 :budget</h2>
<?php
$budget = 2553.89;
$achats = 3554.76;

if ($budget >= $achats){
    echo "<p>Le budget permet de payer les achats.</p>";

}else {
    echo "<p>C'est ne pas posible payer les achats avec cet budget.</p>";
}
?>

<hr>

<h2> Exercise 3 : Vérification de l'âge</h2>
<?php
$age = 17;

if ($age < 18){
    echo "<p>Vous êtes mineur.</p>";

}else {
    echo "<p>Vous êtes majeur.</p>";
}
?>

<hr>

<h2> Exercise 4 : Comparaison de deux nombres</h2>
<?php
$numero1 = 10;
$numero2 = 20;

if ($numero1 > $numero2){
    echo "<p>$numero1 est plus grand que $numero2</p>";

}elseif($numero1 < $numero2){
    echo "<p>$numero1 est petit que $numero2</p>";
}else {
    echo "<p>Les dos numeros son agaux</p>";
}
?>

<hr>

<h2> Exercise 5 </h2>
<?php
$heure= 12;

if ($heure >= 6 && $heure < 12){
    echo "<p>c'est le matin</p>";
}elseif ($heure >= 12 && $heure < 18) {
    echo "<p>c'est l'apres midi</p>";
}else {
    echo "<p>c'est la nuit</p>";
}
?>

<hr>

<h2> Exercise 6  </h2>
<?php
$autorize = true;

if ($autorize){
    echo "<p>vous pouvez entrer</p>";
}else{
    echo "<p>Acces refuse</p>";
}?>

<hr>

<h2> Exercise 7  </h2>
<?php
$montant = 120;
$reduction = 0;

if ($montant > 100){
    $reduction = 0.10;
}elseif ($montant >= 50){
    $reduction = 0.05;
}else{
    $reduction = 0;
}

$montantReduction = $montant * $reduction;
$prixFinal = $montant + $montantReduction;

echo "<p>Montant : $montant €</p>";
echo "<p>Reduction : " . ($reduction*100) . "%</p>";
echo "<p>Prix Final :$prixFinal €</p>"


    ?>

<hr>

<h2> Exercise 8  </h2>

<?php
$age1 = 25;

switch (true){
        case ($age1 >=0 && $age1 <=5):
            echo "<p>Vous êtes un bébé</p>";
            break;
        case ($age1 >=5 && $age1 <=12):
            echo "<p>Vous êtes un enfant</p>";
            break;
            case ($age1 >=13 && $age1 <=19):
                echo "<p>Vous êtes un ado</p>";
                break;
                case ($age1 >=20 && $age1 <=59):
                    echo "<p>Vous êtes un adult</p>";
                    break;
                    default:
                        echo "<p>Vous êtes un senior</p>";
                        break;
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
