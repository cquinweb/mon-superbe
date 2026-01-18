<?php

class MonPDO {
    const HOST_NAME = "localhost";
    const DBNAME    = "gestionAnimauxDB";
    const USER_NAME = "root";
    const PWD       = "";
    private static $monPDOinstance = null;

    public static function getPDO() {

        //PATTERN SINGLETON

        if (self::$monPDOinstance === null) {

            //cree la conexion
            try {
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                $dsn = "mysql:host=" . self::HOST_NAME . ";dbname=" . self::DBNAME . ";charset=utf8mb4";
                self::$monPDOinstance = new PDO($dsn, self::USER_NAME, self::PWD, $options);

            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$monPDOinstance;
    }
}