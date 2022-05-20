<?php


namespace directcall\V1\Rest\User;

use directcall\V1\Rest\User;

class UserModel
{
    private $db; 
    private $conn;
    private $table = "oauth_users";

    public function __construct()
    {
        $this-> db = new Database();
        $this -> conn = $this->db -> getConnection();

    }
    
    public function insert($data, $type)
	{

        $body = [
           
            'username' => $data->username,
            'password' => $data->password,
            'type' => $type
        ];

        $sql = "INSERT INTO `$this->table` (`username`, `password`, `type`) VALUES (:username, :password, :type);";

        $stmt = $this -> conn -> prepare($sql);

        $result =  $stmt -> execute($body);
		
		return $result;
	}

    public function fetch($username)
	{

        $sql = "SELECT * FROM $this->table WHERE username=?";
        $stmt= $this -> conn ->prepare($sql);
        $stmt->execute([$username]);
		
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}
}