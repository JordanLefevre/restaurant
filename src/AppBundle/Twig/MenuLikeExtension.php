<?php

    namespace AppBundle\Twig;

    class MenuLikeExtension extends \Twig_Extension
    {
        protected $menuLike;

        public function __construct($menuLike)
        {
            $this->menuLike = $menuLike;
        }

        public function getFunctions()
        {
            return array(
                new \Twig_SimpleFunction('moyenne_likes', array($this, 'moyenneMenuLike')),
                new \Twig_SimpleFunction('total_likes', array($this, 'totalMenuLike')),
            );
        }

        public function moyenneMenuLike($id)
        {
            return $this
                    ->menuLike
                    ->getMoyenneMenuLike($id);
        }

        public function totalMenuLike($id)
        {
            return $this
                    ->menuLike
                    ->getTotalMenuLike($id);
        }

        public function getName()
        {
            return 'app_extension';
        }
    }

?>
