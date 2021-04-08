<?php

namespace App\Controller;

use App\Services\SkillService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SkillController extends AbstractController
{
	/**
	 * @var SkillService
	 */
	private $skillService;

	public function __construct(SkillService $skillService)
	{
		$this->skillService = $skillService;
	}

    /**
     * @Route("/skill", name="skill")
     */
    public function index(): Response
    {
        return $this->render('skill/index.html.twig', [
            'skills' => $this->skillService->getSkills(),
        ]);
    }
}
