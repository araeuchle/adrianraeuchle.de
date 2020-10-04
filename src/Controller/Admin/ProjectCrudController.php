<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;


class ProjectCrudController extends AbstractCrudController
{
	public static function getEntityFqcn(): string
	{
		return Project::class;
	}

	public function configureCrud(Crud $crud): Crud
	{
		return $crud
			->setDateFormat('dd.MM.Y')
			->setEntityLabelInPlural('Projects')
			->setEntityLabelInSingular('Project')
			->setTimezone('Europe/Berlin')
			;
	}

	public function configureFields(string $pageName): iterable
	{
		return [
			Field::new('name'),
			Field::new('slug'),
			Field::new('description'),
			Field::new('lessonsLearned')
		];
	}
}
