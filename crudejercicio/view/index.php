<?php
session_start();
require_once __DIR__ . '/../data/userDAO.php';
$users = users_all();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/index.css">
    <script>
        function confirmDelete(id){
            if(confirm("¿Eliminar este usuario?")) {
                window.location = "../controller/userController.php?action=delete&id="+id;
            }
        }
    </script>
</head>
<body>
<header><h1>CRUD · Usuarios</h1></header>

<?php if (!empty($_SESSION['flash'])): ?>
    <div class="flash"><?= htmlspecialchars($_SESSION['flash']); unset($_SESSION['flash']); ?></div>
<?php endif; ?>

<a class="btn" href="userForm.php">+ Nuevo usuario</a>

<table class="table">
    <thead>
    <tr>
        <th>#</th><th>Nombre</th><th>Email</th><th>Sexo</th>
        <th>Nacimiento</th><th>Edad</th><th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= htmlspecialchars($u['firstname'].' '.$u['lastname']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td><?= htmlspecialchars($u['gender']) ?></td>
            <td><?= htmlspecialchars($u['birthdate']) ?></td>
            <td><?= (int)$u['age'] ?></td>
            <td class="actions">
                <a href="../controller/userController.php?action=edit&id=<?= $u['id'] ?>">Editar</a>
                <button onclick="confirmDelete(<?= $u['id'] ?>)">Borrar</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
