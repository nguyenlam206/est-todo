<?php

namespace App\Core;

use PDO;

class Database
{
    public function connect()
    {
        try {
            $config = $this->parseConfig();
            
            return new PDO($config);
        } catch (\PDOException $e) {
            throw $e->getMessage();
        }
    }

    protected function parseConfig()
    {
        $params = parse_ini_file(APP_PATH . 'Config/database.ini');

        if ($params === false) {
            throw new \Exception("Error reading database configuration file");
        }

        return sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s", 
            $params['host'], 
            $params['port'], 
            $params['database'], 
            $params['user'], 
            $params['password']
        );
    }
}