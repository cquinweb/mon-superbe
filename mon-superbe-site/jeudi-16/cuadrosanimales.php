<?php
$animaux = [
    ["nom" => "Mina", "age" => 2, "type" => "chien"],
    ["nom" => "Tya", "age" => 7, "type" => "chat"],
    ["nom" => "Milo", "age" => 4, "type" => "chat"],
    ["nom" => "Hocket", "age" => 6, "type" => "chien"],
];

$typeFiltre = isset($_GET['type']) ? $_GET['type'] : 'tous';


function afficherAnimaux($animaux, $typeFiltre) {
    echo "<ul>";
    foreach ($animaux as $animal) {
        if ($typeFiltre === "tous" || $animal["type"] === $typeFiltre) {
            echo "<li>";
            echo "nom : " . $animal["nom"] . "<br>";
            echo "age : " . $animal["age"] . "<br>";
            echo "type : " . $animal["type"];
            echo "</li>";
            echo "---------------";
        }
    }
    echo "</ul>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste Animalerie</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            background-image: url("huellitas.svg");
        }

        .container {
            max-width: 700px;
            margin: 0 auto ;
            margin-top: 7%;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        </style>
</head>
<body>

<div class="container">
<h1>Liste Animalerie</h1>


<a href="?type=tous"><button>Tous</button></a>
<a href="?type=chien"><button>Chiens</button></a>
<a href="?type=chat"><button>Chats</button></a>


<?php
afficherAnimaux($animaux, $typeFiltre);
?>
</div>
</body>
</html>
