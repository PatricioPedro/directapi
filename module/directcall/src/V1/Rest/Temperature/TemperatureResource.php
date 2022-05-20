<?php
namespace directcall\V1\Rest\Temperature;

use Laminas\ApiTools\ApiProblem\ApiProblem;
use Laminas\ApiTools\Rest\AbstractResourceListener;
use directcall\V1\Rest\Temperature\Repository\TemperatureRepositoryInterface;

class TemperatureResource extends AbstractResourceListener
{

    private $temperatureRepository;

    public function __construct(TemperatureRepositoryInterface $temperatureRepository)
    {
        $this->temperatureRepository =  $temperatureRepository;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {

        try {
            $result = $this->temperatureRepository->createTemperature($data);
            return ["response" => $result];
        } catch (\Throwable $th) {
            return ["response" => $th];
        }
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        try {
           $this->temperatureRepository->deleteTemperature($id);
            return true;
        } catch (\Throwable $th) {
            return ["response" => $th];
        }
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        try {
            $todayIs = date("Y/m/d");

            $requestDate = new \DateTime($params["date"]);
            $currentDate = new \DateTime($todayIs);

            if ($requestDate < $currentDate) {
                return ["response" => "Não é permitido buscar dados no passado"];
            } else {
                if ($requestDate != $currentDate) {
                    $difference = date_diff(
                        date_create($params["date"]),  
                        date_create($todayIs)
                    )->format('%a');

                   if ($difference > 10) {
                      return ["response" => "Não pode buscar temperatura para dias muito no futuro, o limite é de 10 dias no futuro"];
                   }
                }
            }

            $data = $this->temperatureRepository->findAllTemperature($params);
            return ["response" => $data];
        } catch (\Throwable $th) {
            return ["response" => $th];
        }
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
