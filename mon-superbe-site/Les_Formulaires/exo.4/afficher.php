<?php
session_start();

if (!isset($_SESSION['clientes'])) {
    $_SESSION['clientes'] = [];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #2196F3;
            color: white;
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
            font-weight: bold;
        }

        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e3f2fd;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #999;
            font-style: italic;
            font-size: 16px;
        }

        .btn-retour {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #666;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-retour:hover {
            background-color: #555;
        }

        .total-clients {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Enregistrés</h2>

    <?php if (count($_SESSION['clientes']) > 0): ?>
        <table>
            <thead>
            <tr>
                <th>Nom:</th>
                <th>Prénom:</th>
                <th>Email:</th>
                <th>Adresse:</th>
                <th>Ville:</th>
                <th>Code postal:</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['clientes'] as $client): ?>
                <tr>
                    <td><?php echo $client['nom']; ?></td>
                    <td><?php echo $client['prenom']; ?></td>
                    <td><?php echo $client['email']; ?></td>
                    <td><?php echo $client['adresse']; ?></td>
                    <td><?php echo $client['ville']; ?></td>
                    <td><?php echo $client['code_postal']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <p class="total-clients">
            <strong>Total: <?php echo count($_SESSION['clientes']); ?> enregistré(s)</strong>
        </p>
    <?php else: ?>
        <p class="no-data">Aucun client enregistré pour le moment.</p>
    <?php endif; ?>

    <a href="formulaire.php" class="btn-retour">← Retour au formulaire</a>
</div>
</body>
</html>