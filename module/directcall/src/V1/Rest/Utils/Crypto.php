<?php

namespace directcall\V1\Rest\Utils;

use directcall\V1\Rest\Utils\CryptographyInterface;

use Laminas\Crypt\Password\Bcrypt;

class Crypto implements CryptographyInterface{
      /**
     * Encrypt a password.
     *
     * @param  mixed $password Identifier of the securepassword to return.
     * @return Password|mixed
     */
    public function hashPassword($password) {
       
        $bcrypt = new Bcrypt();
        $securePass = $bcrypt->create($password);

        return $securePass;
    }
}