<?php

namespace App\Controller;

use App\Entity\Skill;
use App\Form\SkillType;
use App\Services\SkillService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdminSkillsController extends AbstractController
{
    /**
     * @var SkillService
     */
    private $skillService;

    /**
     * AdminSkillsController constructor.
     * @param SkillService $skillService
     */
    public function __construct(SkillService $skillService)
    {
        $this->skillService = $skillService;
    }

    /**
     * @Route("/admin/skills", name="admin_skills")
     */
    public function index()
    {
        return $this->render('admin_skills/index.html.twig', [
            'skills' => $this->skillService->getSkills(),
        ]);
    }

    /**
     * @Route("/admin/skills/add", name="admin_skills_add")
     */
    public function add(Request $request)
    {
        return $this->skillService->updateAction($request);
    }

    /**
     * @ParamConverter("skill", class="App\Entity\Skill")
     * @Route("/admin/skills/edit/{skill}",  name="admin_skills_edit")
     */
    public function edit(Request $request, Skill $skill)
    {
        return $this->skillService->updateAction($request, $skill);
    }

    /**
     * @ParamConverter("skill", class="App\Entity\Skill")
     * @Route("/admin/skills/delete/{skill}",  name="admin_skills_delete")
     */
    public function delete(Request $request, Skill $skill)
    {
        return $this->skillService->deleteAction($skill);
    }
}
