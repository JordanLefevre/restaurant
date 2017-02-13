<?php

namespace AppBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,
                array('constraints' => array(new NotBlank()),
                'attr' => array('class' => 'form-control form_el',
                                'maxlength' => 200,
                                'placeholder' => 'Nom')))
            ->add('description', TextareaType::class,
                array('attr' => array('class' => 'form-control form_el',
                                      'placeholder' => 'Description'),
                'required' => false,
                'empty_data'  => 'Pas de description'))
            ->add('ingredients', TextType::class,
                array('attr' => array('class' => 'form-control form_el',
                                      'minlength' => 50,
                                      'placeholder' => 'Un ingredient, un autre ingredient, ...')))
            ->add('save', SubmitType::class,
                array('label' => 'Ajouter',
                'attr' => array('class' => 'btn btn-primary form_el')))
        ;
    }
}
