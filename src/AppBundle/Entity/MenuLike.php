<?php
    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;

    /**
     * @ORM\Entity(repositoryClass="AppBundle\Repository\MenuLikeRepository")
     * @ORM\Table(name="menulike")
     */
    class MenuLike
    {
        /**
         * @ORM\Id @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        private $id;

        /**
         * @ORM\Column(type="integer")
         * @Assert\Range(
         *      min = 0,
         *      max = 5,
         *      minMessage = "La valeur minimale doit être de 0",
         *      maxMessage = "La valeur maximale doit être de 5"
         *)
         */
        private $rating;

        /**
         * Many MenuLikes has One Menu.
         * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Menu")
         * @ORM\JoinColumn(name="menu_id", referencedColumnName="id")
         */
        private $menu;

        /**
         * @ORM\Column(type="string")
         */
        private $user;

        /**
         * Get the value of Id
         *
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of Id
         *
         * @param mixed id
         *
         * @return self
         */
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of Rating
         *
         * @return mixed
         */
        public function getRating()
        {
            return $this->rating;
        }

        /**
         * Set the value of Rating
         *
         * @param mixed rating
         *
         * @return self
         */
        public function setRating($rating)
        {
            $this->rating = $rating;

            return $this;
        }

        /**
         * Get the value of Menu
         *
         * @return mixed
         */
        public function getMenu()
        {
            return $this->menu;
        }

        /**
         * Set the value of Menu
         *
         * @param mixed menu
         *
         * @return self
         */
        public function setMenu($menu)
        {
            $this->menu = $menu;

            return $this;
        }

        /**
         * Get the value of User
         *
         * @return mixed
         */
        public function getUser()
        {
            return $this->user;
        }

        /**
         * Set the value of User
         *
         * @param mixed user
         *
         * @return self
         */
        public function setUser($user)
        {
            $this->user = $user;

            return $this;
        }
    }
?>
