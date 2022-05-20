<?php
namespace directcall\V1\Rest\Temperature\Repository;
use directcall\V1\Rest\Temperature\Model\TemperatureModel;
use directcall\V1\Rest\Temperature\Repository\TemperatureRepositoryInterface;

class TemperatureRepository implements TemperatureRepositoryInterface
{

    private $temperatureModel;

    public function __construct()
    {
        $this-> temperatureModel = new TemperatureModel();
    }
   /**
     * Return a set of all temperature  that we can iterate over.
     *
     * Each entry should be a Temperature instance.
     *
     * @return Temperature[]
     */
    public function findAllTemperature($params) {
        try {
          
            $data = $this -> temperatureModel -> fetchAll($params);
            return $data;
  
          } catch (\Throwable $th) {
             throw $th;
          }
    }

    /**
     * Return a single temperature.
     *
     * @return Temperature
     */
    public function createTemperature($data) {
        try {
            
            $data = $this -> temperatureModel -> insert($data);
            return $data;
  
          } catch (\Throwable $th) {
            throw $th;
          }
    }

    public function deleteTemperature($id) {
        try {
            
             $this -> temperatureModel -> delete($id);
            return true;
  
          } catch (\Throwable $th) {
            throw $th;
          }
    }
}
