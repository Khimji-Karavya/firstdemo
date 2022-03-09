<?php

namespace App\Form;

use App\Entity\Education;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Date;




class EducationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('degree', TextType::class,[ 
                'constraints' => [ 
                    new Regex([
                        'pattern' => "/^[a-zA-Z]+$/"
                    ])]])
            ->add('yearOfPassing', TextType::class)
            ->add('persantage', TextType::class,[
                'label_format' => 'percentage',
                    'constraints' => [ 
                        new Positive([
                ])]])    
            ->add('univercity', TextType::class, [
                'constraints' => [ 
                    new Regex([
                        'pattern' => "/^[a-zA-Z_ ]+$/"
                    ])]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Education::class,
        ]);
    }
}
