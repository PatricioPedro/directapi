<?php
namespace directcall\V1\Rest\Provider;

class ProviderEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $username;

    /**
     * @param string $username
     * @param string $name
     * @param int|null $id
     */
    public function __construct($username, $name, $id = null)
    {
        $this->username = $username;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getname()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getusername()
    {
        return $this->username;
    }
}
