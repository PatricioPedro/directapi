<?php

namespace directcall\V1\Rest\Utils;

interface CryptographyInterface {
      /**
     * Return a single User.
     *
     * @param  string $id Identifier of the post to return.
     * @return Password|mixed
     */
    public function hashPassword($password);
}