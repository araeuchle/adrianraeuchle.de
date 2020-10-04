<?php

namespace App\Controller;

use App\Entity\Project;
use App\Services\ProjectService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class ProjectController extends AbstractController
{
	/**
	 * @var ProjectService
	 */
	private $projectService;

	public function __construct(ProjectService $projectService)
	{
		$this->projectService = $projectService;
	}

	/**
     * @Route("/projects", name="projects")
     */
    public function index()
    {
        return $this->render('project/index.html.twig', [
            'projects' => $this->projectService->findAll(),
        ]);
    }

	/**
	 * @Route("/projects/{slug}", name="projects.detail")
	 * @param Project $project
	 */
    public function detail(Project $project)
	{
		return $this->render('project/detail.html.twig', [
			'project' => $project
		]);
	}
}
