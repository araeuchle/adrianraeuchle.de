<?php

namespace App\Controller;

use App\Services\GithubApiService;
use App\Services\JobService;
use App\Services\PostService;
use App\Services\ProjectService;
use App\Services\SkillService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
	/**
	 * @var SkillService
	 */
	private $skillService;

	/**
	 * @var JobService
	 */
	private $jobService;

	/**
	 * @var ProjectService
	 */
	private $projectService;

	/**
	 * HomeController constructor.
	 * @param SkillService $skillService
	 * @param JobService $jobService
	 * @param ProjectService $projectService
	 */
	public function __construct(
		SkillService $skillService,
		JobService $jobService,
		ProjectService $projectService
	) {
		$this->skillService = $skillService;
		$this->jobService = $jobService;
		$this->projectService = $projectService;
	}


	/**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
        	'skills' => $this->skillService->getSkills(),
			'jobs' => $this->jobService->getJobs(),
			'projects' => $this->projectService->getProjects()
		]);
    }
}
