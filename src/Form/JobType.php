<?php

namespace App\Form;

use App\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('startDate', DateType::class, [
				'widget' => 'single_text',
				// this is actually the default format for single_text
				'format' => 'yyyy-MM-dd',
			])
			->add('endDate', DateType::class, [
				'widget' => 'single_text',
				// this is actually the default format for single_text
				'format' => 'yyyy-MM-dd',
			])
            ->add('description', TextareaType::class)
            ->add('company')
            ->add('sorting')
			->add('submit', SubmitType::class, [
				'label' => 'Speichern'
			])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
