<?php
/**
 * Created by PhpStorm.
 * User: pro
 * Date: 2019-03-23
 * Time: 23:59
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenusFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('specCount')
            ->add('funFact');

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

}