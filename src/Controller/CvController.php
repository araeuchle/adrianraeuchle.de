<?php

namespace App\Controller;

use App\Entity\Skill;
use App\Services\JobService;
use App\Services\SkillService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CvController extends AbstractController
{
	/**
	 * @var JobService
	 */
	private $jobService;

	/**
	 * @var SkillService
	 */
	private $skillService;

	public function __construct(JobService  $jobService, SkillService $skillService)
	{
		$this->jobService = $jobService;
		$this->skillService = $skillService;
	}
    /**
     * @Route("/cv", name="cv")
     */
    public function index()
    {
		return $this->render('cv/index.html.twig', [
			'jobs'  => $this->jobService->getJobs(),
			'skills' => $this->skillService->getSkills()
		]);
    }
}
