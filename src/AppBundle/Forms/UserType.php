<?php

    namespace AppBundle\Forms;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\PasswordType;
    use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
    use Symfony\Component\Validator\Constraints\NotBlank;

    class UserType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('username', TextType::class)
                ->add('password', RepeatedType::class, array(
                   'type' => PasswordType::class,
                   'first_options'  => array('label' => 'Mot de passe'),
                   'second_options' => array('label' => 'Répéter le mot de passe')
               ))
               ->add('save', SubmitType::class,
                   array('label' => 'S\'inscrire',
                   'attr' => array('class' => 'btn btn-primary form_el')))
            ;
        }
    }

?>
