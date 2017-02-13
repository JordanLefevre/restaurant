<?php

namespace AppBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\NotBlank;

class MenuLikeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', TextType::class,
                array('constraints' => array(new NotBlank()),
                'attr' => array('class' => 'form-control form_el',
                                'maxlength' => 20,
                                'placeholder' => 'Nom')))
            ->add('rating', ChoiceType::class,
                array('choices' => [
                        '0 étoile' => 0,
                        '1 étoile' => 1,
                        '2 étoiles' => 2,
                        '3 étoiles' => 3,
                        '4 étoiles' => 4,
                        '5 étoiles' => 5
                    ],
                'expanded' => true))
            ->add('save', SubmitType::class,
                array('label' => 'Noter',
                'attr' => array('class' => 'btn btn-info form_el')))
        ;
    }
}
