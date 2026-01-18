<?php
require_once __DIR__ . "/processAnimal.php";?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Gestion Animaux DB</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Liste de Animaux</h1>

<table>
    <thead>
    <tr>
    <th>Nom</th>
    <th>Age</th>
    <th>Sex</th>
    <th>Type</th>
    <th>Images</th>
    </tr>
    </thead>

<tbody>
<?php foreach ($animaux as $a):
    $id = $a ->getIdAnimal();
?>

    <tr>
        <td><?= htmlspecialchars($a->getNom()) ?></td>
        <td><?= htmlspecialchars($a ->getAge()) ?></td>
        <td><?= htmlspecialchars($a ->getSexe()) ?></td>
        <td><?= htmlspecialchars($typesByAnimal[$id]) ?></td>
        <td class="imag">
            <?php foreach ($imagesByAnimal[$id] as $url):?>
            <img src="images/<?= htmlspecialchars($url) ?>" alt="">
            <?php endforeach;?>
        </td>
    </tr>
<?php endforeach;?>
</tbody>
</table>

</body>
</html>