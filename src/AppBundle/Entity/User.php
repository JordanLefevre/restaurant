<?php
    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;
    use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
    use Symfony\Component\Security\Core\User\UserInterface;

    /**
     * @ORM\Entity
     * @ORM\Table(name="user")
     */
    class User implements UserInterface
    {
        /**
         * @ORM\Id @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        private $id;

        /**
         * @ORM\Column(type="string", unique=true)
         * @Assert\NotBlank()
         * @Assert\Length(max="200")
         */
        private $username;

        /**
         * @ORM\Column(type="string", length=64)
         * @Assert\NotBlank()
         * @Assert\Length(max="64")
         */
        private $password;

        /**
        * @ORM\Column(type="string")
        */
        private $role;


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
         * Get the value of Name
         *
         * @return mixed
         */
        public function getUsername()
        {
            return $this->username;
        }

        /**
         * Set the value of Name
         *
         * @param mixed name
         *
         * @return self
         */
        public function setUsername($username)
        {
            $this->username = $username;

            return $this;
        }

        /**
         * Get the value of Password
         *
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * Set the value of Password
         *
         * @param mixed password
         *
         * @return self
         */
        public function setPassword($password)
        {
            $this->password = $password;

            return $this;
        }

        public function getSalt()
        {
            // you *may* need a real salt depending on your encoder
            // see section on salt below
            return null;
        }

        public function getRoles()
        {
            return [$this->role];
        }

        public function eraseCredentials()
        {
        }


    /**
     * Get the value of Role
     *
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of Role
     *
     * @param mixed role
     *
     * @return self
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

}
?>
