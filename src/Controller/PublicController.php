<?php

namespace App\Controller;

use App\Services\GithubApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
	/**
	 * @var GithubApiService
	 */
	private $githubApiService;

	/**
	 * PublicController constructor.
	 * @param GithubApiService $githubApiService
	 */
	public function __construct(GithubApiService $githubApiService)
	{
		$this->githubApiService = $githubApiService;
	}

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('public/home.html.twig', [
        	'projectCount' => $this->githubApiService->getProjectCount(),
			'followersCount' => $this->githubApiService->getFollowersCount(),
			'daysCount' => $this->githubApiService->getDaysCount()
		]);
    }

	/**
	 * @Route("/cv", name="cv")
	 */
    public function cv()
	{
		return $this->render('public/cv.html.twig');
	}
}
