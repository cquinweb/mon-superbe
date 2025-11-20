<?php
session_start();
require_once __DIR__ . '/../data/userDAO.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$editing = $id > 0;
$user = $editing ? user_by_id($id) : null;

$old   = $_SESSION['old']   ?? [];
$errs  = $_SESSION['errors']?? [];
unset($_SESSION['old'], $_SESSION['errors']);

function v($key, $def=''){
    global $old, $user, $editing;
    if (isset($old[$key])) return htmlspecialchars($old[$key]);
    if ($editing && isset($user[$key])) return htmlspecialchars($user[$key]);
    return $def;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?= $editing ? 'Editar' : 'Nuevo' ?> usuario</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/userForm.css">
    <script defer src="../scripts/userFormValidation.js"></script>
</head>
<body>
<a class="btn" href="index.php">← Volver</a>
<h2><?= $editing ? 'Editar' : 'Crear' ?> usuario</h2>

<form id="userForm" method="post" action="../controller/userController.php">
    <input type="hidden" name="action" value="<?= $editing?'update':'create' ?>">
    <?php if ($editing): ?><input type="hidden" name="id" value="<?= (int)$id ?>"><?php endif; ?>

    <div class="field">
        <label>Nombre</label>
        <input name="firstname" value="<?= v('firstname') ?>" required>
        <?php if(isset($errs['firstname'])): ?><small class="err"><?= $errs['firstname'] ?></small><?php endif; ?>
    </div>

    <div class="field">
        <label>Apellido</label>
        <input name="lastname" value="<?= v('lastname') ?>" required>
        <?php if(isset($errs['lastname'])): ?><small class="err"><?= $errs['lastname'] ?></small><?php endif; ?>
    </div>

    <div class="field">
        <label>Email</label>
        <input name="email" type="email" value="<?= v('email') ?>" required>
        <?php if(isset($errs['email'])): ?><small class="err"><?= $errs['email'] ?></small><?php endif; ?>
    </div>

    <div class="field">
        <label>Sexo</label>
        <label><input type="radio" name="gender" value="Homme" <?= v('gender')==='Homme'?'checked':''; ?>> Hombre</label>
        <label><input type="radio" name="gender" value="Femme" <?= v('gender')==='Femme'?'checked':''; ?>> Mujer</label>
        <?php if(isset($errs['gender'])): ?><small class="err"><?= $errs['gender'] ?></small><?php endif; ?>
    </div>

    <div class="field">
        <label>Fecha de nacimiento</label>
        <input name="birthdate" type="date" value="<?= v('birthdate') ?>" required>
        <?php if(isset($errs['birthdate'])): ?><small class="err"><?= $errs['birthdate'] ?></small><?php endif; ?>
    </div>

    <div class="field">
        <label>Edad</label>
        <input name="age" type="number" min="10" max="99" value="<?= v('age') ?>" required>
        <?php if(isset($errs['age'])): ?><small class="err"><?= $errs['age'] ?></small><?php endif; ?>
    </div>

    <button class="btn primary" type="submit"><?= $editing?'Actualizar':'Guardar' ?></button>
</form>
</body>
</html>
