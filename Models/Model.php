<?php

abstract class Model {
    private const CONFIG = __DIR__ . '/../core/config.json';

    private const OPTIONS = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    protected static $_pdo = null; 

    protected static function getPdo() {
        if (is_null(self::$_pdo)) {
            $config = json_decode(file_get_contents(self::CONFIG));
            self::$_pdo = new PDO($config->dsn, $config->user, $config->psswd,self::OPTIONS);
        }
        return self::$_pdo;
    }
}