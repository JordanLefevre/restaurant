<?php

    namespace AppBundle\Services;

    class MenuLikeService {
        private $doctrine;

        public function __construct($doctrine)
        {
            $this->doctrine = $doctrine;
        }

        public function getTotalMenuLike($menuLike)
        {
            return $this
            ->doctrine
            ->getRepository('AppBundle:MenuLike')
            ->getNbRatings($menuLike);
        }

        public function getMoyenneMenuLike($menuLike)
        {
            return $this
            ->doctrine
            ->getRepository('AppBundle:MenuLike')
            ->getRatingAvg($menuLike);
        }
    }
?>
