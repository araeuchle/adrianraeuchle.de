<?php
namespace App\Services;

use App\Entity\Job;
use Doctrine\ORM\EntityManagerInterface;

class JobService
{
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;

	public function __construct(EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	public function getJobs()
	{
		return $this->entityManager
			->getRepository(Job::class)
			->findAll();
	}
}
