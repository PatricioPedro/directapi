<?php


namespace directcall\V1\Rest\Temperature;

use directcall\V1\Rest\Temperature;

class TemperatureModel
{
    private $db;
    private $conn;
    private $table = "temperature";

    public function __construct()
    {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    public function fetchAll($params)
    {


        $sql = $params["city_uf"] && $params["date"] ?  "SELECT AVG(average_temperature) AS temperature FROM $this->table WHERE city_uf=? AND day=?"
            : "SELECT * FROM $this->table";

        $stmt = $this->conn->prepare($sql);

        if ($params["city_uf"] && $params["date"]) {

            $stmt->execute([$params['city_uf'], $params['date']]);

            $today = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $date = new \DateTime($params['date']);
            $date->add(new \DateInterval('P10D'));

            $stmt->execute([$params['city_uf'], $date->format('Y-m-d')]);

            $next10Days = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return ["today" => $today, "next10Days" => $next10Days];
        } else {

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function insert($data)
    {

        $body = [
            'city_uf' => $data->city_uf,
            'unit' => $data->unit,
            'average_temperature' => $data->average_temperature,
            'day' => $data->day,
            'provider_id' => $data->provider_id,
        ];

        $sql = "INSERT INTO `$this->table` (`city_uf`, `unit`, `average_temperature`, `day`, `provider_id`) VALUES (:city_uf,:unit, :average_temperature, :day, :provider_id);";

        $stmt = $this->conn->prepare($sql);

        $result =  $stmt->execute($body);

        return $result;
    }

    public function delete($id)
    {

        $data = [
            'id' => $id
        ];

        $sql = "DELETE FROM $this->table WHERE id = :id";
        $this->conn->prepare($sql)->execute($data);

        return true;
    }
}
