<?php
namespace directcall\V1\Rest\Temperature;

use directcall\V1\Rest\Temperature;

class TemperatureModel
{

    public function fetchAllCategories()
	{
        $db = new Database();

        $conn = $db -> connectDb();


        $sql = "SELECT * FROM post";

        $stmt = $conn -> prepare($sql);

        $stmt -> execute();
		
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}