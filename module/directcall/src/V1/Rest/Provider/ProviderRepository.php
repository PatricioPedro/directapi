<?php
namespace directcall\V1\Rest\Provider;
use directcall\V1\Rest\Provider;

class ProviderRepository implements ProviderRepositoryInterface
{

  private $providerModel;


  public function __construct()
  {
    $this->providerModel = new ProviderModel();
  }
   /**
     * Return a set of all Provider  that we can iterate over.
     *
     * Each entry should be a Provider instance.
     *
     * @return Provider[]
     */
    public function findAllProvider() {

        try {
          
          $data = $this -> providerModel -> fetchAll();
          return $data;

        } catch (\Throwable $th) {
           throw $th;
        }

        
    }

    /**
     * Return a single Provider.
     *
     * @param  int $id Identifier of the post to return.
     * @return Provider
     */
    public function deleteProvider($id) {

      try {
        $this -> providerModel -> delete($id);
        return ["response" => "DELETE SUCCEFULLY"];

      } catch (\Throwable $th) {
        throw $th;
      }

    }

        /**
     * Return a single Provider.
     *
     * @param  int $id Identifier of the post to return.
     * @return Provider
     */
    public function findProvider($id) {
      try {
        
        $data = $this -> providerModel -> fetch($id);
        return $data;

      } catch (\Throwable $th) {
         throw $th;
      }
    }

    /**
     * Return a single Provider.
     *
     * @return Provider
     */
    public function createProvider($data) {
        try {
            
          $data = $this -> providerModel -> insert($data);
          return $data;

        } catch (\Throwable $th) {
          throw $th;
        }
    }

    /**
     * Return a single Provider.
     *
     * @param  int $id Identifier of the post to return.
     * @return Provider
     */
    public function updateProvider($id, $data) {
      try {
            
        $data = $this -> providerModel -> update($id, $data);
        return $data;

      } catch (\Throwable $th) {
        throw $th;
      }
    }
}
