<?php


class Conexion {
    public static function Conectar()
    {
        $usuario = '';
        $password = '';
        $host = '127.0.0.1';
        $dbname = 'mvc2025';
        $pdo = new PDO($usuario . $password . $host . $dbname);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
