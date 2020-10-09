<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectType;
use App\Services\ProjectService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdminProjectController extends AbstractController
{
    /**
     * @var ProjectService
     */
    private $projectService;

    /**
     * AdminProjectsController constructor.
     * @param ProjectService $projectService
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * @Route("/admin/projects", name="admin_projects")
     */
    public function index()
    {
        return $this->render('admin_projects/index.html.twig', [
            'projects' => $this->projectService->getProjects(),
        ]);
    }

    /**
     * @Route("/admin/projects/add", name="admin_projects_add")
     */
    public function add(Request $request)
    {
        return $this->projectService->updateAction($request);
    }

    /**
     * @Route("/admin/projects/edit/{project}", name="admin_projects_edit")
     * @ParamConverter("project", class="App\Entity\Project")
     */
    public function edit(Request $request, Project $project)
    {
       return $this->projectService->updateAction($request, $project);
    }

    /**
     * @Route("/admin/projects/delete/{project}", name="admin_projects_delete")
     * @ParamConverter("project", class="App\Entity\Project")
     */
    public function delete(Request $request, Project $project)
    {
        return $this->projectService->deleteAction($project);
    }
}
