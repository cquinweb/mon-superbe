<?php
// Iniciar sesión
session_start();

// Inicializar array de clientes si no existe
if (!isset($_SESSION['clientes'])) {
    $_SESSION['clientes'] = [];
}

// Procesar datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envoyer'])) {
    $cliente = [
        'nom' => htmlspecialchars($_POST['nom']),
        'prenom' => htmlspecialchars($_POST['prenom']),
        'adresse' => htmlspecialchars($_POST['adresse']),
        'ville' => htmlspecialchars($_POST['ville']),
        'code_postal' => htmlspecialchars($_POST['code_postal'])
    ];

    // Agregar cliente al array
    $_SESSION['clientes'][] = $cliente;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 4 - Adresse Client</title>
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
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #2196F3;
        }

        button {
            background-color: #2196F3;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0b7dda;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #2196F3;
            color: white;
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        td {
            padding: 10px 12px;
            border: 1px solid #ddd;
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f0f0f0;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>
<!-- FORMULARIO -->
<div class="container">
    <h2>Exercice 4</h2>

    <form method="POST" action="">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" id="adresse" name="adresse" placeholder="Adresse" required>
        </div>

        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" placeholder="Ville" required>
        </div>

        <div class="form-group">
            <label for="code_postal">Code postal</label>
            <input type="text" id="code_postal" name="code_postal" placeholder="CP" required>
        </div>

        <button type="submit" name="envoyer">Envoyer</button>
    </form>
</div>

<!-- TABLA DE CLIENTES -->
<div class="container">
    <h2>Liste des clients enregistrés</h2>

    <?php if (count($_SESSION['clientes']) > 0): ?>
        <table>
            <tr>
                <th>Nom:</th>
                <th>Prénom:</th>
                <th>Adresse:</th>
                <th>Ville:</th>
                <th>Code postal:</th>
            </tr>

            <?php foreach ($_SESSION['clientes'] as $client): ?>
                <tr>
                    <td><?php echo $client['nom']; ?></td>
                    <td><?php echo $client['prenom']; ?></td>
                    <td><?php echo $client['adresse']; ?></td>
                    <td><?php echo $client['ville']; ?></td>
                    <td><?php echo $client['code_postal']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p class="no-data">Aucun client enregistré pour le moment.</p>
    <?php endif; ?>
</div>
</body>
</html>