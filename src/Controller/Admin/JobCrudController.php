<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;


class JobCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
	{
		return Job::class;
	}

	public function configureCrud(Crud $crud): Crud
	{
		return $crud
			->setDateFormat('dd.MM.Y')
			->setEntityLabelInPlural('Jobs')
			->setEntityLabelInSingular('Job')
			->setTimezone('Europe/Berlin')
		;
	}

	public function configureFields(string $pageName): iterable
	{
		return [
			Field::new('title'),
			Field::new('company'),
			DateField::new('startDate'),
			DateField::new('endDate'),
			Field::new('description'),
			IntegerField::new('sorting')
		];
	}
}
