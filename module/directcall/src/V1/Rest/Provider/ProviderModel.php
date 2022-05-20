<?php


namespace directcall\V1\Rest\Provider;

use directcall\V1\Rest\Provider;

class ProviderModel
{
    private $db; 
    private $conn;
    private $table = "provider";

    public function __construct()
    {
        $this-> db = new Database();
        $this -> conn = $this->db -> getConnection();

    }

    public function fetchAll()
	{

        $sql = "SELECT * FROM $this->table";

        $stmt = $this -> conn -> prepare($sql);

        $stmt -> execute();
		
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

    public function insert($data)
	{

        $body = [
            'name' => $data->name
        ];

        $sql = "INSERT INTO `$this->table` (`name`) VALUES (:name);";

        $stmt = $this -> conn -> prepare($sql);

        $result =  $stmt -> execute($body);
		
		return $result;
	}

    public function delete($id)
	{

        $data = [
            'id' => $id
        ];


        // Delete on cascade 

        $sql = "DELETE FROM temperature WHERE provider_id = :id";
        $this -> conn ->prepare($sql)->execute($data);

        $sql = "DELETE FROM $this->table WHERE id = :id";
        $this -> conn ->prepare($sql)->execute($data);

	}

    public function update($id, $data)
	{

        $sql = "UPDATE $this->table SET name=? WHERE id=?";
        $stmt= $this -> conn ->prepare($sql);
        $result = $stmt->execute([$data->name, $id]);
		
		return $result;
	}
    public function fetch($id)
	{

        $sql = "SELECT * FROM $this->table WHERE id=?";
        $stmt= $this -> conn ->prepare($sql);
        $stmt->execute([$id]);
		
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}
}