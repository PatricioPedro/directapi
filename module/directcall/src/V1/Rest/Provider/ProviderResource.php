<?php

namespace directcall\V1\Rest\Provider;

use Laminas\ApiTools\ApiProblem\ApiProblem;
use Laminas\ApiTools\Rest\AbstractResourceListener;

use directcall\V1\Rest\Provider\Repository\ProviderRepositoryInterface;

// use directcall\V1\Rest\User;

class ProviderResource extends AbstractResourceListener
{

    private $providerRepository;

    public function __construct(ProviderRepositoryInterface $providerRepository)
    {
        $this->providerRepository = $providerRepository;
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
            $result = $this->providerRepository->createProvider($data);
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
            $data = $this->providerRepository->deleteProvider($id);
            return ["response" => $data];
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
        try {
            $data = $this->providerRepository->findProvider($id);
            return ["response" => $data];
        } catch (\Throwable $th) {
            return ["response" => $th];
        }
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

            $data = $this->providerRepository->findAllProvider();
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
        try {
            $data = $this->providerRepository->updateProvider($id, $data);
            return ["response" => $data];
        } catch (\Throwable $th) {
            return ["response" => $th];
        }
    }
}
