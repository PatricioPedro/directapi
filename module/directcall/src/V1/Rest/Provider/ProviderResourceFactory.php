<?php
namespace directcall\V1\Rest\Provider;
use directcall\V1\Rest\Provider\Repository\ProviderRepository;

class ProviderResourceFactory
{
    private $providerRepository;

    public function __construct()
    {
        $this -> providerRepository= new ProviderRepository();
    }

    public function __invoke($services)
    {
        return new ProviderResource($this-> providerRepository);
    }
}
