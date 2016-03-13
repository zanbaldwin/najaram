<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builderInterface, array $options)
    {
        $builderInterface
            ->add('title')
            ->add('content')
            ->add('category')
            ;
    }

    public function setDefaultOption(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Posts'
        ));
    }

    public function getName()
    {
        return 'appbundle_post';
    }
}