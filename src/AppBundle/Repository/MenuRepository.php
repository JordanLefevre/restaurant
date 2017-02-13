<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MenuRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()->createQuery('SELECT m FROM AppBundle:Menu m ORDER BY m.name ASC')->getResult();
    }
}
