<?php

namespace App\Controller;

use App\DataProvider\CategoryImageProvider;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Services\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdminCategoryController extends AbstractController
{
	/**
	 * @var CategoryService
	 */
	private $categoryService;

	/**
	 * @var CategoryImageProvider
	 */
	private $categoryImageProvider;

	/**
	 * AdminCategoryController constructor.
	 * @param CategoryService $categoryService
	 */
	public function __construct(
		CategoryService $categoryService,
		CategoryImageProvider $categoryImageProvider
	) {
		$this->categoryService = $categoryService;
		$this->categoryImageProvider = $categoryImageProvider;
	}

	/**
     * @Route("/admin/category", name="admin_category")
     */
    public function index()
    {
        return $this->render('admin_category/index.html.twig', [
            'categories' => $this->categoryService->getCategories(),
        ]);
    }

	/**
	 * @Route("/admin/category/add", name="admin_category_add")
	 */
    public function add(Request $request)
	{
		return $this->categoryService->updateAction($request);
 	}

	/**
	 * @Route("/admin/category/edit/{category}", name="admin_category_edit")
	 * @ParamConverter("category", class="App\Entity\Category")
	 */
 	public function edit(Request $request, Category $category)
	{
		return $this->categoryService->updateAction($request, $category);
	}

	/**
	 * @Route("/admin/category/delete/{category}", name="admin_category_delete")
	 * @ParamConverter("category", class="App\Entity\Category")
	 */
	public function delete(Request $request, Category $category)
	{
		return $this->categoryService->deleteAction($category);
	}


}
