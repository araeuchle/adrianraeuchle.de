<?php
namespace App\Services;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;

class ProjectService
{
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;

	/**
	 * ProjectService constructor.
	 * @param EntityManagerInterface $entityManager
	 */
	public function __construct(EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	/**
	 * @return mixed
	 */
	public function findAll()
	{
		return $this->entityManager
			->getRepository(Project::class)
			->findAll();
	}
}
