<?php

namespace App\Form;

use App\Entity\User;
use App\Form\EducationType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\PositiveOrZero;
use Symfony\Component\Validator\Constraints\Regex;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fname', TextType::class, [
            'constraints' => [ 
                new Regex([
                    'pattern' => "/^[a-zA-Z_ ]+$/"
                ])]])
            ->add('lname', TextType::class, [
                'constraints' => [ 
                    new Regex([
                    'pattern' => "/^[a-zA-Z_ ]+$/"
                ])]])
            ->add('email', EmailType::class)
            ->add('dob',TextType::class, array(
                'required' => false,
                'empty_data' => null,
                'attr' => array(
                    'placeholder' => 'mm/dd/yyyy'
                )))
            ->add('mobile', NumberType::class,[
                'constraints' => [ 
                    new PositiveOrZero([
                ])]])
            ->add('education', CollectionType::class, [
                'entry_type' => EducationType::class,
                'entry_options' => ['label' => false]
            ])
            ->add('save', SubmitType::class, ['label' => 'submit'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
