<?php
// delete_user.php
require_once 'db_connect.php';

try {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if ($id <= 0) {
        throw new Exception('ID invalide');
    }

    $stmt = mysqli_prepare($conn, "DELETE FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    header('Location: index.php?success=deleted');
    exit;

} catch (mysqli_sql_exception $e) {
    header('Location: index.php?error=' . urlencode('Erreur DB: ' . $e->getMessage()));
    exit;

} catch (Exception $e) {
    header('Location: index.php?error=' . urlencode($e->getMessage()));
    exit;
}
