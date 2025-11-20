<?php
// add_user.php
require_once 'db_connect.php';

try {
    // Sanitizar entrada
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname  = trim($_POST['lastname'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $gender    = $_POST['gender'] ?? '';
    $birthdate = $_POST['birthdate'] ?? '';
    $age       = isset($_POST['age']) ? (int)$_POST['age'] : null;

    // Validación servidor
    if ($firstname === '' || mb_strlen($firstname) < 2 || mb_strlen($firstname) > 50) {
        throw new Exception('Prénom invalide');
    }
    if ($lastname === '' || mb_strlen($lastname) < 2 || mb_strlen($lastname) > 50) {
        throw new Exception('Nom invalide');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Email invalide');
    }
    if (!in_array($gender, ['Homme', 'Femme'], true)) {
        throw new Exception('Sexe invalide');
    }
    if ($birthdate === '' || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthdate)) {
        throw new Exception('Date de naissance invalide');
    }
    $age = (int)$age;
    if ($age < 10 || $age > 99) {
        throw new Exception('Âge invalide');
    }

    // Insert con prepared
    $sql  = "INSERT INTO users (firstname, lastname, email, gender, birthdate, age, created_at)
             VALUES (?, ?, ?, ?, ?, ?, NOW())";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssi', $firstname, $lastname, $email, $gender, $birthdate, $age);
    mysqli_stmt_execute($stmt);

    header('Location: index.php?success=added');
    exit;

} catch (mysqli_sql_exception $e) {
    if ((int)$e->getCode() === 1062) {
        header('Location: index.php?error=' . urlencode('Cet email existe déjà.'));
        exit;
    }
    header('Location: index.php?error=' . urlencode('Erreur DB: ' . $e->getMessage()));
    exit;

} catch (Exception $e) {
    header('Location: index.php?error=' . urlencode($e->getMessage()));
    exit;
}
