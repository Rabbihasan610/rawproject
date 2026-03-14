<?php
namespace App\Core;

use PDO;

class DB {
    
    private static ?PDO $pdo  = null;

    public static function pdo() {
        if(self::$pdo) return self::$pdo;

        $con = "mysql:host=" . getenv("DB_HOST") . ";dbname=" . getenv("DB_NAME") . ";charset=" . getenv("DB_CHARST") ?: "utf8";

        self::$pdo = new PDO($con, getenv("DB_USER"), getenv("DB_PASS"), [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);


        return self::$pdo;
    }
}