<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class MenuLikeRepository extends EntityRepository
{
    public function getNbRatings($id)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT COUNT(m) FROM AppBundle:MenuLike m WHERE m.menu = :id')
            ->setParameter(':id', $id)
            ->getSingleScalarResult();
    }

    public function getRatingAvg($id)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT AVG(m.rating) FROM AppBundle:MenuLike m WHERE m.menu = :id')
            ->setParameter(':id', $id)
            ->getSingleScalarResult();
    }
}
