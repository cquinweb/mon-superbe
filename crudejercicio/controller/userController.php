<?php
session_start();
require_once __DIR__ . '/../data/userDAO.php';

function sanitize(string $s): string { return trim(filter_var($s, FILTER_SANITIZE_FULL_SPECIAL_CHARS)); }

// --- Validación servidor (coincide con el TP?) ---
function validate_user(array $in, ?int $editingId=null): array {
    $errors = [];
    $firstname = sanitize($in['firstname'] ?? '');
    $lastname  = sanitize($in['lastname'] ?? '');
    $email     = trim($in['email'] ?? '');
    $gender    = $in['gender'] ?? '';
    $birthdate = $in['birthdate'] ?? '';
    $age       = (int)($in['age'] ?? 0);

    if ($firstname === '') $errors['firstname'] = 'Obligatorio';
    if ($lastname  === '') $errors['lastname']  = 'Obligatorio';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Email inválido';
    if ($gender !== 'Homme' && $gender !== 'Femme') $errors['gender'] = 'Seleccione sexo';
    if (!$birthdate || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthdate)) {
        $errors['birthdate'] = 'Fecha inválida';
    } else if (strtotime($birthdate) >= strtotime('today')) {
        $errors['birthdate'] = 'Debe ser anterior a hoy';
    }
    if ($age < 10 || $age > 99) $errors['age'] = 'Entre 10 y 99';

    if (user_email_exists($email, $editingId)) {
        $errors['email'] = 'Email ya existe';
    }

    return [$errors, [
        'firstname'=>$firstname,'lastname'=>$lastname,'email'=>$email,
        'gender'=>$gender,'birthdate'=>$birthdate,'age'=>$age
    ]];
}

// --- Enrutado  ---
$action = $_GET['action'] ?? $_POST['action'] ?? 'list';

switch ($action) {
    case 'create':
        [$errors, $clean] = validate_user($_POST);
        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
        } else {
            user_create($clean);
            $_SESSION['flash'] = 'Usuario creado';
        }
        header('Location: ../view/index.php'); exit;

    case 'edit':
        $id = (int)($_GET['id'] ?? 0);
        header("Location: ../view/userForm.php?id=$id"); exit;

    case 'update':
        $id = (int)($_POST['id'] ?? 0);
        [$errors, $clean] = validate_user($_POST, $id);
        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: ../view/userForm.php?id=$id"); exit;
        } else {
            user_update($id, $clean);
            $_SESSION['flash'] = 'Usuario actualizado';
            header('Location: ../view/index.php'); exit;
        }

    case 'delete':
        $id = (int)($_GET['id'] ?? 0);
        user_delete($id);
        $_SESSION['flash'] = 'Usuario eliminado';
        header('Location: ../view/index.php'); exit;

    default:
        header('Location: ../view/index.php'); exit;
}
