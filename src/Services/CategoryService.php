<?php
namespace App\Services;

use App\DataProvider\CategoryImageProvider;
use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class CategoryService
{
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;

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
	 * @var CategoryImageProvider
	 */
	private $categoryImageProvider;

	/**
	 * CategoryService constructor.
	 * @param EntityManagerInterface $entityManager
	 * @param FormFactoryInterface $formFactory
	 * @param UrlGeneratorInterface $urlGenerator
	 * @param Environment $twig
	 * @param CategoryImageProvider $categoryImageProvider
	 */
	public function __construct(
		EntityManagerInterface $entityManager,
		FormFactoryInterface $formFactory,
		UrlGeneratorInterface $urlGenerator,
		Environment $twig,
		CategoryImageProvider $categoryImageProvider
	) {
		$this->entityManager = $entityManager;
		$this->formFactory = $formFactory;
		$this->urlGenerator = $urlGenerator;
		$this->twig = $twig;
		$this->categoryImageProvider = $categoryImageProvider;
	}


	public function getCategories()
	{
		return $this->entityManager
			->getRepository(Category::class)
			->findBy([], ['name' => 'ASC']);
	}

	/**
	 * @param Request $request
	 * @param Category|null $category
	 * @return RedirectResponse|Response
	 */
	public function updateAction(Request $request, Category $category = null)
	{
		$images = $this->categoryImageProvider->getImages();

		$form = $this->formFactory->create(CategoryType::class, $category, [
			'images' => $images
		]);

		if ($request->isMethod('POST')) {
			$form->handleRequest($request);

			if ($form->isValid()) {
				$category = $form->getData();

				$this->save($category);

				return new RedirectResponse($this->urlGenerator->generate('admin_category'));
			}
		}

		$view = $this->twig->render('admin_category/update.html.twig', [
			'form' => $form->createView(),
			'type' => $category === null ? 'add' : 'edit'
		]);

		$response = new Response();
		$response->setContent($view);

		return $response;
	}

	public function save(Category $category)
	{
		$this->entityManager->persist($category);
		$this->entityManager->flush();
	}

	public function deleteAction(Category $category)
	{
		$this->entityManager->remove($category);
		$this->entityManager->flush();

		return new RedirectResponse($this->urlGenerator->generate('admin_category'));
	}
}
