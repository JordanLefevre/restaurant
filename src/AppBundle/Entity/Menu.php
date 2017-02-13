<?php
    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;

    /**
     * @ORM\Entity(repositoryClass="AppBundle\Repository\MenuRepository")
     * @ORM\Table(name="menu")
     */
    class Menu
    {
        /**
         * @ORM\Id @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        private $id;

        /**
         * @ORM\Column(type="string")
         * @Assert\NotBlank()
         * @Assert\Length(max="200")
         */
        private $name;

        /**
         * @ORM\Column(type="string")
         */
        private $description;

        /**
         * @ORM\Column(type="string")
         * @Assert\NotBlank()
         * @Assert\Length(min="50")
         */
        private $ingredients;

    /**
     * Get the value of namespace AppBundle/Entity;
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of namespace AppBundle/Entity;
     *
     * @param string name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of Description
     *
     * @param mixed description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of Ingredients
     *
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set the value of Ingredients
     *
     * @param mixed ingredients
     *
     * @return self
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }


    /**
     * Get the value of namespace AppBundle\Entity;
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of namespace AppBundle\Entity;
     *
     * @param int id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

}
?>
