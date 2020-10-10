<?php
namespace App\DataProvider;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpKernel\KernelInterface;

class CategoryImageProvider
{
	/**
	 * @var array
	 */
	private $images = [];

	/**
	 * @var string
	 */
	private $imagePath;

	/**
	 * CategoryImageProvider constructor.
	 * @param KernelInterface $kernel
	 */
	public function __construct(KernelInterface $kernel)
	{
		$this->imagePath = $kernel->getProjectDir() .
			DIRECTORY_SEPARATOR .
			'public' .
			DIRECTORY_SEPARATOR .
			'build'.
			DIRECTORY_SEPARATOR .
			'images' .
			DIRECTORY_SEPARATOR;
	}

	/**
	 * @return array
	 */
	public function getImages()
	{
		$finder = new Finder();
		$finder->files()->in($this->imagePath);

		/** @var SplFileInfo $file */
		foreach ($finder as $file) {
			$this->images[$file->getFilename()] = 'build' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $file->getFilename();
		}

		return $this->images;
	}
}
