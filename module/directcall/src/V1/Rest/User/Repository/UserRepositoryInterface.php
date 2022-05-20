<?php

namespace directcall\V1\Rest\User\Repository;

interface UserRepositoryInterface
{

        /**
     * Return a single User.
     *
     * @param  int $id Identifier of the post to return.
     * @return User
     */
    public function findUser($username);

    /**
     * Return a single User.
     *
     * @return User
     */
    public function createUser($data, $type);

}