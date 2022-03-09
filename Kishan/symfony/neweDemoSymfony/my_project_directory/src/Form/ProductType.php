<?php
namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Positive;

class ProductType extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options): void
    {  

        $builder
            ->add('name',TextType::class,[
                'label_format' => 'Full %name%',
                'constraints' => [ 
                    new Length([
                        'max' => 100,
                        'maxMessage'=>"maximum 100 charecter in product name."
                    ])
                ]])
            ->add('price',NumberType::class,[ 
                'constraints' => [ 
                        new Positive]])
            ->add('discription',TextType::class,[
                'constraints' => [ 
                new Length([
                    'max' => 200,
                    'min' => 50,
                    'maxMessage'=>"maximum 200 charecter in product description.",
                    'minMessage'=>"maximum 50 charecter in product description."
                ])]])
            ->add('title',TextType::class,[ 'constraints' => [ 
                new Length([
                    'max' => 100,
                    'min' => 10,
                    'maxMessage'=>"maximum 100 charecter in product title.",
                    'minMessage'=>"maximum 10 charecter in product title."
                ])]])
            ->add('category',EntityType::class,
                [ 
                'class' => Category::class,
                'query_builder' => function(EntityRepository $er){
                        return $er->createQueryBuilder('c')->orderBy('c.name','ASC');
                    },
                'placeholder' => 'Choose an category',
                'choice_label' => 'name'
                ])
            ->add('date', TextType::class)
            ->add('state', ChoiceType::class, [
                'placeholder' => 'Choose an state',
                'choices' => [
                    'Gujarat' => 'Gujarat',
                    'Rajshthan' => 'Rajshthan',
                    'UP' => 'UP',
                ],
            ])
            ->add('save', SubmitType::class, ['label' => 'submit'])
            ->getForm()
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
