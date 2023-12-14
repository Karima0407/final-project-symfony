<?php

namespace App\Form;

use App\Entity\Vetements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class VetementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image', FileType::class, [
                'label' => 'image (image file)',
                'mapped' => false,
                'required' => false,
                'constraints' => [new \Symfony\Component\Validator\Constraints\Image([
                    'maxSize' => '15M',
                    'mimeTypes' => [
                        'image/jpeg',
                        'image/png',
                        'image/jpg',
                        'image/webp',
                    ],
                ])],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false, // Adapt based on your requirements
            ])
            ->add('descriptionDetaille', TextareaType::class, [
                'label' => 'Detailed Description',
                'required' => false, // Adapt based on your requirements
            ])
            ->add('prix', MoneyType::class, [
                'label' => 'Price',
                'currency' => 'USD', // Change the currency as needed
                'required' => false, // Adapt based on your requirements
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vetements::class,
        ]);
    }
}
