<?php
namespace directcall\V1\Rest\User;
use directcall\V1\Rest\User;

class UserRepository implements UserRepositoryInterface
{

  private $userModel;


  public function __construct()
  {
    $this->userModel = new UserModel();
  }

        /**
     * Return a single user.
     *
     * @param  int $id Identifier of the post to return.
     * @return user
     */
    public function findUser($username) {
      try {
        
        $data = $this -> userModel -> fetch($username);
        return $data;

      } catch (\Throwable $th) {
         throw $th;
      }
    }

    /**
     * Return a single user.
     *
     * @return user
     */
    public function createUser($data, $type) {
        try {
            
          $data = $this -> userModel -> insert($data, $type);
          return $data;

        } catch (\Throwable $th) {
          throw $th;
        }
    }
}
