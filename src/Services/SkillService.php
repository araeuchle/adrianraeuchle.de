<?php
namespace App\Services;

use App\Entity\Skill;
use Doctrine\ORM\EntityManagerInterface;

class SkillService
{
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;

	public function __construct(EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	public function getSkills()
	{
		return $this->entityManager
			->getRepository(Skill::class)
			->findAll();
	}
}
