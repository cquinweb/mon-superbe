<?php
ob_start(); //NE PAS MODIFIER
$titre = "Exo 1 : Les Formulaires" ; //Mettre le nom du titre de la page que vous voulez
?>

    <!-- mettre ici le code -->

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Inscription - Club de Tennis</title>
    <style>

        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            padding: 20px;
            background: #f7f9fb;
            color: #111;
        }
        .container {
            max-width: 480px;
            margin: 0 auto;
            background: #fff;
            padding: 18px;
            border-radius: 10px;
            box-shadow: 0 6px 24px rgba(17, 24, 39, 0.08);
        }
        h1 { font-size: 1.25rem; margin-bottom: 12px; }
        label { display: block; margin-top: 12px; font-weight: 600; }
        input[type="text"],
        input[type="email"],
        input[type="date"] {
            width: 100%;
            padding: 8px 10px;
            margin-top: 6px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .submit-btn {
            display: inline-block;
            margin-top: 16px;
            padding: 10px 16px;
            background: #0f766e;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }
        .submit-btn:hover { opacity: 0.95; }
        .hint { font-size: 0.875rem; color: #6b7280; margin-top: 6px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Inscription - Nouveau membre</h1>


    <form action="/exo1" method="post" novalidate>
        <div class="row">
            <div>
                <label for="nom">Nom <span aria-hidden="true">*</span></label>
                <input
                    type="text"
                    id="nom"
                    name="nom"
                    placeholder="Ex: Dupont"
                    required
                    maxlength="100"
                    autocomplete="family-name"
                />
            </div>

            <div>
                <label for="prenom">Prénom <span aria-hidden="true">*</span></label>
                <input
                    type="text"
                    id="prenom"
                    name="prenom"
                    placeholder="Ex: Marie"
                    required
                    maxlength="100"
                    autocomplete="given-name"
                />
            </div>
        </div>

        <label for="date_naissance">Date de naissance <span aria-hidden="true">*</span></label>
        <input
            type="date"
            id="date_naissance"
            name="date_naissance"
            required
            max="2025-10-14"
        />

        <label for="email">Email <span aria-hidden="true">*</span></label>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="nom@exemple.com"
            required
            maxlength="254"
            autocomplete="email"
        />

        <label for="adresse">Adresse</label>
        <input
            type="text"
            id="adresse"
            name="adresse"
            placeholder="Rue, numéro, code postal, ville"
            maxlength="255"
            autocomplete="street-address"
        />
        <p class="hint">Les champs marqués d'un * sont obligatoires.</p>

        <button type="submit" class="submit-btn">Enregistrer le membre</button>
    </form>
</div>
</body>
</html>


<?php

$str = "Bonjour et bienvenue au cours de programmation";

for ($i = 0; $i < strlen($str); $i++) {
    echo $str[$i];
    echo "<br>";
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

