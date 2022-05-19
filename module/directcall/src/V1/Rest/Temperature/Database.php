<?php
namespace directcall\V1\Rest\Temperature;

class Database
{

    private $db_host = "database";
    private $db_name = "directcall";
    private $db_user = "root";
    private $db_pwd = "example";

    public function connectDb()
    {
        try {
            $conn = new \PDO('mysql:host=' . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pwd);
            $conn -> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}
