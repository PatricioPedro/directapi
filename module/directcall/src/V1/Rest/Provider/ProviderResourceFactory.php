<?php
namespace directcall\V1\Rest\Provider;

class ProviderResourceFactory
{
    public function __invoke($services)
    {
        return new ProviderResource();
    }
}
