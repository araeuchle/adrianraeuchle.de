<?php
namespace App\Services;

use App\DataProvider\CategoryProvider;
use App\Entity\Post;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class PostService
{
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;

	/**
	 * @var CategoryProvider
	 */
	private $categoryProvider;

	/**
	 * @var FormFactoryInterface
	 */
	private $formFactory;

	/**
	 * @var UrlGeneratorInterface
	 */
	private $urlGenerator;

	/**
	 * @var Environment
	 */
	private $twig;

	/**
	 * @var PaginatorInterface
	 */
	private $paginator;

	/**
	 * PostService constructor.
	 * @param EntityManagerInterface $entityManager
	 * @param CategoryProvider $categoryProvider
	 * @param FormFactoryInterface $formFactory
	 * @param UrlGeneratorInterface $urlGenerator
	 * @param Environment $twig
	 */
	public function __construct(
		EntityManagerInterface $entityManager,
		CategoryProvider $categoryProvider,
		FormFactoryInterface $formFactory,
		UrlGeneratorInterface $urlGenerator,
		Environment $twig,
		PaginatorInterface $paginator
	) {
		$this->entityManager = $entityManager;
		$this->categoryProvider = $categoryProvider;
		$this->formFactory = $formFactory;
		$this->urlGenerator = $urlGenerator;
		$this->twig = $twig;
		$this->paginator = $paginator;
	}

	public function getAllPosts()
	{
		return $this->entityManager
			->getRepository(Post::class)
			->findAll();
	}

	public function getPosts(Request $request)
	{
		$qb = $this->entityManager
			->getRepository(Post::class)
			->createQueryBuilder('p');

		return $this->paginator->paginate(
				$qb,
				$request->query->getInt('page', 1),
				10
			);

	}

	/**
	 * @param Post $post
	 */
	public function save(Post $post)
	{
		$this->entityManager->persist($post);
		$this->entityManager->flush();
	}

	/**
	 * @param Request $request
	 * @param Post|null $post
	 * @return RedirectResponse|Response
	 */
	public function updateAction(Request $request, Post $post = null)
	{
		$categories = $this->categoryProvider->getCategories();

		$form = $this->formFactory->create(PostType::class, $post, [
			'categories' => $categories
		]);

		if ($request->isMethod('POST')) {
			$form->handleRequest($request);

			if ($form->isValid()) {
				$post = $form->getData();

				$this->save($post);

				return new RedirectResponse($this->urlGenerator->generate('admin_post'));
			}
		}

		$view = $this->twig->render('admin_post/update.html.twig',  [
			'form' => $form->createView(),
			'type' => $post === null ? 'add' : 'edit'
		]);

		$response = new Response();
		$response->setContent($view);

		return $response;
	}

	/**
	 * @param Post $post
	 * @return RedirectResponse
	 */
	public function deleteAction(Post $post)
	{
		$this->entityManager->remove($post);
		$this->entityManager->flush();

		return new RedirectResponse($this->urlGenerator->generate('admin_post'));
	}

	/**
	 * @return mixed
	 */
	public function getNewestPosts()
	{
		return $this->entityManager
			->getRepository(Post::class)
			->getNewestPosts();
	}

}
