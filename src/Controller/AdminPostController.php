<?php

namespace App\Controller;

use App\Entity\Post;
use App\Services\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdminPostController extends AbstractController
{
	/**
	 * @var PostService
	 */
	private $postService;

	/**
	 * AdminPostController constructor.
	 * @param PostService $postService
	 */
	public function __construct(PostService $postService)
	{
		$this->postService = $postService;
	}

	/**
     * @Route("/admin/post", name="admin_post")
     */
    public function index()
    {
        return $this->render('admin_post/index.html.twig', [
            'posts' => $this->postService->getPosts(),
        ]);
    }

	/**
	 * @Route("/admin/post/add", name="admin_post_add")
	 */
    public function add(Request $request)
	{
		return $this->postService->updateAction($request);
	}

	/**
	 * @Route("/admin/post/edit/{post}", name="admin_post_edit")
	 * @ParamConverter("post", class="App\Entity\Post")
	 */
	public function edit(Request $request, Post $post)
	{
		return $this->postService->updateAction($request, $post);
	}

	/**
	 * @Route("/admin/post/delete/{post}", name="admin_post_delete")
	 * @ParamConverter("post", class="App\Entity\Post")
	 */
	public function delete(Request $request, Post $post)
	{
		return $this->postService->deleteAction($post);
	}
}
