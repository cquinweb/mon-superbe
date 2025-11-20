<?php
require 'db_connect.php';
$res = mysqli_query($conn, "SHOW TABLES LIKE 'users'");
if (mysqli_num_rows($res) === 1) {
    echo "OK: conectado a 'crud1' y la tabla 'users' existe.";
} else {
    echo "Conectado a 'crud1' pero NO existe la tabla 'users'.";
}