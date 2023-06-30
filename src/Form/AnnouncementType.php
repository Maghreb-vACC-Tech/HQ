<?php

namespace App\Form;

use App\Entity\Announcement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AnnouncementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', ChoiceType::class , [
                'choices' =>[
                    'Reda F.' => 'Reda F.',
                    'Bobbie Chell' => 'Bobbie Chell',
                    'Emir' => 'Emir',
                    'Ilyass B.' => 'Ilyass B.',
                    'Nick F.' => 'Nick F.',
                    'Ali B.' => 'Ali B.',
                    'Aymen S.' => 'Aymen S.',
                ]
            ])
            // ->add('Date')
            ->add('Subject')
            ->add('Message')
            ->add('Add', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Announcement::class,
        ]);
    }
}
