<?php

namespace directcall\V1\Rest\Provider;

interface ProviderRepositoryInterface
{
    /**
     * Return a set of all Provider  that we can iterate over.
     *
     * Each entry should be a Provider instance.
     *
     * @return Provider[]
     */
    public function findAllProvider();

    /**
     * Return a single Provider.
     *
     * @param  int $id Identifier of the post to return.
     * @return Provider
     */
    public function deleteProvider($id);

        /**
     * Return a single Provider.
     *
     * @param  int $id Identifier of the post to return.
     * @return Provider
     */
    public function findProvider($id);

    /**
     * Return a single Provider.
     *
     * @return Provider
     */
    public function createProvider($data);

    /**
     * Return a single Provider.
     *
     * @param  int $id Identifier of the post to return.
     * @return Provider
     */
    public function updateProvider($id, $data);

    /**
     * Return a single Provider.
     *
     * @param  int $id Identifier of the post to return.
     * @return Provider
     */

}