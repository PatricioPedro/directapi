<?php

namespace directcall\V1\Rest\Config;

class Database
{

    private $db_host = "database";
    private $db_name = "directcall";
    private $db_user = "root";
    private $db_pwd = "example";

    private $conn;

    public function __construct()
    {
        $this -> connectDb();
    }

    private function connectDb()
    {
        try {
            $this-> conn  = new \PDO('mysql:host=' . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pwd);
            $this-> conn  -> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            $this-> conn = null;
            throw $e;
        }
    }

    public function getConnection () {
        return $this -> conn;        
    }
}
