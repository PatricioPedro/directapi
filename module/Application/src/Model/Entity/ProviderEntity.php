<?php

declare(strict_types=1);

namespace Application\Model\Entity;

class CommentEntity
{
    protected $name;
    protected $slug;
    protected $act;


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getAct()
    {
        return $this->act;
    }

    public function setAct($act)
    {
        $this->act = $act;
        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }
}

