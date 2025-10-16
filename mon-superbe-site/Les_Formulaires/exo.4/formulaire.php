<?php

session_start();


if (!isset($_SESSION['clientes'])) {
    $_SESSION['clientes'] = [];
}

$error = '';
$success = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envoyer'])) {
    $email = htmlspecialchars($_POST['email']);


    $email_existe = false;
    foreach ($_SESSION['clientes'] as $cliente_existente) {
        if ($cliente_existente['email'] === $email) {
            $email_existe = true;
            break;
        }
    }

    if ($email_existe) {
        $error = "⚠️ Ce email est déjà enregistré !";
    } else {
        $cliente = [
            'nom' => htmlspecialchars($_POST['nom']),
            'prenom' => htmlspecialchars($_POST['prenom']),
            'email' => $email,
            'adresse' => htmlspecialchars($_POST['adresse']),
            'ville' => htmlspecialchars($_POST['ville']),
            'code_postal' => htmlspecialchars($_POST['code_postal'])
        ];


        $_SESSION['clientes'][] = $cliente;

        $success = "Client enregistré avec succès !";


        header("refresh:1;url=afficher.php");
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Client</title>
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
            max-width: 600px;
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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #2196F3;
        }

        button {
            width: 100%;
            background-color: #2196F3;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0b7dda;
        }

        .link-ver {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #2196F3;
            text-decoration: none;
            font-weight: bold;
        }

        .link-ver:hover {
            text-decoration: underline;
        }

        .error {
            background-color: #ffebee;
            color: #c62828;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border-left: 4px solid #c62828;
            font-weight: bold;
        }

        .success {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border-left: 4px solid #2e7d32;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Enregistrement Client</h2>

    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="nom"></label>
            <input type="text" id="nom" name="nom" placeholder=" nom" required>
        </div>

        <div class="form-group">
            <label for="prenom"></label>
            <input type="text" id="prenom" name="prenom" placeholder="prénom" required>
        </div>

        <div class="form-group">
            <label for="email"></label>
            <input type="email" id="email" name="email" placeholder="email" required>
        </div>

        <div class="form-group">
            <label for="adresse"></label>
            <input type="text" id="adresse" name="adresse" placeholder="adresse" required>
        </div>

        <div class="form-group">
            <label for="ville"></label>
            <input type="text" id="ville" name="ville" placeholder="ville" required>
        </div>

        <div class="form-group">
            <label for="code_postal"></label>
            <input type="text" id="code_postal" name="code_postal" placeholder="code postal" required>
        </div>

        <button type="submit" name="envoyer">Envoyer</button>
    </form>

    <a href="afficher.php" class="link-ver">Voir la liste</a>
</div>
</body>
</html>