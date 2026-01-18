
<h2>exercise 1 </h2>

<?php
$mois1 = array (
    "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
    "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
);

for ($i = 0; $i < count($mois1); $i++){
    echo $mois1[$i]." ";
}



/////
$mois2 = [
    "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
    "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
];
foreach ($mois2 as $m){
    echo $m." ";
}
?>

<hr>


<h2>exercise 2 </h2>

<?php
$joursparmois = [
    "Janvier" => 31,
    "Février" => 28,
    "Mars" =>   31,
    "Avril" => 30,
    "Mai" => 31,
    "Juin" =>30,
    "Juillet" =>31,
    "Août" => 31,
    "Septembre" =>30,
    "Octobre" => 31,
    "Novembre" => 30,
    "Décembre" => 31
];
foreach ($joursparmois as $mois => $jours){
    echo $mois => $jours;
}


$cles = array_keys ($joursparmois);
echo "<p><strong>Les clés :</strong> " . implode(", ", $cles) . "</p>";

// Quelles sont les valeurs ?
$valeurs = array_values($joursparmois);
echo "<p><strong>Les valeurs :</strong> " . implode(", ", $valeurs) . "</p>";
?>

<hr>

<h2>exercise 3 </h2>
<?php
echo "Le nombre de jours de moins de Septembre est : " . $joursparmois["Septembre"] . "<br>";

?>

<h2>Exercice 5</h2>
<?php

$cles = array_keys($joursparmois);

for ($i = 0; $i < count($cles); $i++) {
    $mois = $cles[$i];
    echo $mois . " => " . $joursparmois[$mois] . "<br>";
}
?>

<h2>Exercice 4</h2>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
    <tr>
        <th>Mois</th>
        <th>Nombre de jours</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($joursparmois as $mois => $jours): ?>
        <tr>
            <td><?= $mois ?></td>
            <td><?= $jours ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
















