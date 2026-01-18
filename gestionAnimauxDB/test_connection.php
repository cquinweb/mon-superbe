<?php

require_once "MonPDO.class.php";

try {
    $pdo = MonPDO::getPDO();
    echo "✅ Conexión a la base de datos OK";
} catch (Exception $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}