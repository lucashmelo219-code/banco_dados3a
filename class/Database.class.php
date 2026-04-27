<?php

final class Database {
    private static $instance = null;
    private $connection;
    private function __construct() {
        try {
            $config=parse_ini_file(__DIR__."/../config.ini",true)["database"];
            $dns= "";
            if($config["driver"]=== "myslq") {
                $dns= "mysql:host={$config['host']};port={$config['port']};dbname={$config['data']};charset=utf8";
            }
            elseif($config["driver"]=== "pgsql") {
                $dns= "pgsql:host={$config['host']};port={$config['port']};dbname={$config['data']};charset=utf8";
            }
            else{
                throw new Exception("Driver de banco de dados não suportado" . $config["driver"]."");
                
            }
            $this->connection = new PDO($dns, $config["user"], $config["pass"]);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            

        } catch (PDOException $e) {
            error_log('Erro de conexão com o banco de dados: ' . $e->getMessage());
            die('Erro ao conectar ao banco de dados. Por favor, tente novamente mais tarde.');
        }

    }
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function getConnection() {
        return $this->connection;
    }

}
