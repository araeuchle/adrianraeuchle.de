<?php

namespace App\Controller;

use App\Entity\Post;
use App\Services\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class BlogController extends AbstractController
{
	/**
	 * @var PostService
	 */
	private $postService;

	/**
	 * BlogController constructor.
	 * @param PostService $postService
	 */
	public function __construct(PostService $postService)
	{
		$this->postService = $postService;
	}

	/**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'posts' => $this->postService->getPosts(),
        ]);
    }

	/**
	 * @Route("/blog/detail/{slug}", name="blog_detail")
	 * @ParamConverter("post", class="App\Entity\Post")
	 */
    public function detail(Post $post)
	{
		return $this->render('blog/detail.html.twig', [
			'post' => $post
		]);
	}
}
