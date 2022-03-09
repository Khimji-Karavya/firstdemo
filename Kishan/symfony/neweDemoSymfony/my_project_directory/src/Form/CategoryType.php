<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;



class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,['constraints' => [
                    new Length([
                        'max' => 50,
                        'maxMessage'=>"maximum 50 charecter in product name."
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z_ ]+$/'
                    ])
            ]])
            
            ->add('save', SubmitType::class, ['label' => 'submit'])
            ->getForm();
               
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'date_class'=> Category::class
        ]);
    }
}
