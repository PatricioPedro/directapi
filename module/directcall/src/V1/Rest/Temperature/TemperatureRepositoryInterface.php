<?php

namespace directcall\V1\Rest\Temperature;

interface TemperatureRepositoryInterface
{
    /**
     * Return a set of all temperature  that we can iterate over.
     *
     * Each entry should be a Temperature instance.
     *
     * @return Temperature[]
     */
    public function findAllTemperature($params);

  
    /**
     * Return a single temperature.
     *
     * @return Temperature
     */
    public function createTemperature($data);


     /**
     * Return a single Temperature.
     *
     * @param  int $id Identifier of the post to return.
     * @return Temperature
     */
    public function deleteTemperature($id);

}