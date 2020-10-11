<?php

namespace App\Controller;

use App\Services\GithubApiService;
use App\Services\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
	/**
	 * @var GithubApiService
	 */
	private $githubApiService;

	/**
	 * @var PostService
	 */
	private $postService;

	/**
	 * PublicController constructor.
	 * @param GithubApiService $githubApiService
	 * @param PostService $postService
	 */
	public function __construct(
		GithubApiService $githubApiService,
		PostService $postService
	) {
		$this->githubApiService = $githubApiService;
		$this->postService = $postService;
	}

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
        	'projectCount' => $this->githubApiService->getProjectCount(),
			'followersCount' => $this->githubApiService->getFollowersCount(),
			'daysCount' => $this->githubApiService->getDaysCount(),
			'posts' => $this->postService->getNewestPosts()
		]);
    }
}
