<?php
require_once 'db_connect.php';

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: index.php');
        exit;
    }

    // Recibir datos
    $id        = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname  = trim($_POST['lastname'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $gender    = $_POST['gender'] ?? '';
    $birthdate = $_POST['birthdate'] ?? '';
    $age       = isset($_POST['age']) ? (int)$_POST['age'] : 0;

    // Validaciones básicas
    if ($id <= 0) {
        throw new Exception('ID invalide');
    }
    if ($firstname === '' || $lastname === '' || $email === '' || $gender === '' || $birthdate === '' || $age === 0) {
        throw new Exception('Tous les champs sont obligatoires');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Email invalide');
    }
    if (!in_array($gender, ['Homme', 'Femme'], true)) {
        throw new Exception('Sexe invalide');
    }
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthdate)) {
        throw new Exception('Format de date invalide');
    }
    if ($age < 10 || $age > 99) {
        throw new Exception('Âge invalide');
    }

    // Verificar si email ya existe para otro usuario
    $check_sql = "SELECT id FROM users WHERE email = ? AND id != ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, 'si', $email, $id);
    mysqli_stmt_execute($check_stmt);
    $check_result = mysqli_stmt_get_result($check_stmt);

    if ($check_result && mysqli_num_rows($check_result) > 0) {
        throw new Exception('Cet email existe déjà.');
    }

    // Actualizar usuario
    $update_sql = "UPDATE users 
                   SET firstname = ?, lastname = ?, email = ?, gender = ?, birthdate = ?, age = ?
                   WHERE id = ?";
    $stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($stmt, 'sssssii', $firstname, $lastname, $email, $gender, $birthdate, $age, $id);
    mysqli_stmt_execute($stmt);

    header('Location: index.php?success=updated');
    exit;

} catch (mysqli_sql_exception $e) {
    header('Location: index.php?error=' . urlencode('Erreur DB: ' . $e->getMessage()));
    exit;

} catch (Exception $e) {
    header('Location: index.php?error=' . urlencode($e->getMessage()));
    exit;
}

mysqli_close($conn);
