<?php
namespace directcall\V1\Rest\Temperature;
use directcall\V1\Rest\Temperature\Repository\TemperatureRepository;
class TemperatureResourceFactory
{
    private $temperatureRepository;

    public function __construct()
    {
        $this->temperatureRepository = new TemperatureRepository();
    }
    public function __invoke($services)
    {
        return new TemperatureResource($this->temperatureRepository);
    }
}
