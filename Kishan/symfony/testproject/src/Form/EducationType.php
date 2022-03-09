<?php

namespace App\Form;
use App\Entity\Education;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;



class EducationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Degree', TextType::class,[ 
            'constraints' => [ 
                new Regex([
                    'pattern' => "/^[a-zA-Z]+$/"
                ])]])
        ->add('yearOfPassing', TextType::class,[ 
            
            'invalid_message' => 'only year',
            ])
        ->add('percentage', NumberType::class,[
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
