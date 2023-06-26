<?php

namespace App\Form;

use App\Entity\Trainee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ModifyTraineeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('CID')
            ->add('Name')
            ->add('Rating', ChoiceType::class , [
                'choices' =>[
                    'OBS' => 'OBS',
                    'S1' => 'S1',
                    'S2' => 'S2',
                    'S3' => 'S3',
                    'C1' => 'C1',
                ]
            ])
            ->add('Mentor', ChoiceType::class , [
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
            ->add('Comment')
            ->add('Modify', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trainee::class,
        ]);
    }
}
