<?php ob_start(); //NE PAS MODIFIER
$titre = "Exo 1 : tableaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<h2>exercise 1 </h2>
// Méthode 1 : array()
<?php
$paisCapitales1 = array(
    "Allemagne" => "Berlin",
    "Italie" => "Rome",
    "Belgique" => "Bruxelles",
    "Maroc" => "Rabat",
    "Espagne" => "Madrid",
);

// Méthode 2 : []

$paisCapitales2 = [
    "Allemagne" => "Berlin",
    "Italie" => "Rome",
    "Belgique" => "Bruxelles",
    "Maroc" => "Rabat",
    "Espagne" => "Madrid",
];

echo "Capital de la Belgique: " .$paisCapitales1["Belgique"] . "<br>";
echo "Capital de Espagne: " .$paisCapitales2["Espagne"] . "<br>";

?>

<hr>

<h2>exercise 2 </h2>

<?php
$pays_population = array(
    'France' => 67595000,
    'Suede' => 9998000,
    'Suisse' => 8417000,
    'Kosovo' => 1820631,
    'Malte' => 434403,
    'Mexique' => 122273500,
    'Allemagne' => 82800000,
);
echo "Le 3em element (Suisse): " .$pays_population["Suisse"] . "<br><br>";

echo "La population de France es de: " .$pays_population["France"] . "<br><br>";
echo "la population de Mexique es de: " .$pays_population["Mexique"] . "<br><br>";


?>

<hr>

<h2>exercise 3 </h2>

<?php
$persones = array(
    'jean' => 16,
    'manuel' => 19,
    'andre' => 66,
);

echo "Age de Jean : " .$persones["jean"] . "<br><br>";
echo "Jean a " . $persones["jean"] . "ans<br>";
echo "manuel a " . $persones["manuel"] . "ans<br>";
echo "Andre a " . $persones["andre"] . "ans<br>";

?>

<hr>

<h2>exercise 4 </h2>

<?php
if ($persones['jean'] > $persones['manuel']) {
    echo "jean est plus grand que manuel";
}else {
    echo "manuel est plus grand que jean";
}
?>

<hr>

<h2>exercise 5 </h2>
<?php
$maxAge = $persones["jean"];
$maxNom = "jean";

if ($persones["manuel"] > $maxAge) {
    $maxAge = $persones["manuel"];
    $maxNom = "manuel";
}
if ($persones["andre"] > $maxAge) {
    $maxAge = $persones["andre"];
    $maxNom = "andre";
}
echo $maxNom . "est plus grand que manuel et jean";

?>


<hr>

<h2>exercise 6 </h2>
<?php
$persones2 = array(
    'Adam' => 46,
    'Linda' => 35,
    'Joe' => 26
);
$maxAge2 = $persones2["Adam"];
$maxNom2 = "Adam";

if ($persones2["Linda"] > $maxAge2) {
    $maxAge2 = $persones2["Linda"];
    $maxNom2 = "Linda";
}
if ($persones2["Joe"] > $maxAge2) {
    $maxAge2 = $persones2["Joe"];
    $maxNom2 = "Joe";
}
echo $maxNom2 . "est plus grand que linda et joe";


?>


<h2>exercise 7 </h2>
<?php
$val = 10;
while ($val <= 20) {
    if ($val == 15) {

    }else {
        echo $val."<br>";
    }
    $val++;
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
