<?php
namespace App\DataProvider;

use App\Entity\Category;
use App\Services\CategoryService;

class CategoryProvider
{
	/**
	 * @var CategoryService
	 */
	private $categoryService;

	/**
	 * CategoryProvider constructor.
	 * @param CategoryService $categoryService
	 */
	public function __construct(CategoryService $categoryService)
	{
		$this->categoryService = $categoryService;
	}

	/**
	 * @return array
	 */
	public function getCategories()
	{
		$categories = $this->categoryService->getCategoriesWithImages();
		$data = [];

		/** @var Category $category */
		foreach ($categories as $category) {
			$data[$category->getName()] = $category;
		}

		return $data;
	}


}
