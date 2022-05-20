<?php
namespace directcall\V1\Rest\User;
use  directcall\V1\Rest\User\Repository\UserRepository;

class UserResourceFactory
{
    private $userRepository;

    public function __construct()
    {
        $this -> userRepository = new UserRepository();    
    }
    public function __invoke($services)
    {
        return new UserResource($this -> userRepository);
    }
}
