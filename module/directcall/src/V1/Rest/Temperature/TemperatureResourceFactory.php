<?php
namespace directcall\V1\Rest\Temperature;

class TemperatureResourceFactory
{
    public function __invoke($services)
    {
        return new TemperatureResource();
    }
}
