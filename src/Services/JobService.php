<?php
namespace App\Services;

use App\Entity\Job;
use App\Form\JobType;
use Doctrine\DBAL\Platforms\Keywords\ReservedKeywordsValidator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class JobService
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

	public function __construct(
		EntityManagerInterface $entityManager,
		FormFactoryInterface $formFactory,
		UrlGeneratorInterface $urlGenerator,
		Environment $twig
	) {
		$this->entityManager = $entityManager;
		$this->formFactory = $formFactory;
		$this->urlGenerator = $urlGenerator;
		$this->twig = $twig;
	}

	public function getJobs()
	{
		return $this->entityManager
			->getRepository(Job::class)
			->findBy([], ['sorting' => 'ASC']);
	}

	public function save(Job $job)
	{
		$this->entityManager->persist($job);
		$this->entityManager->flush();
	}

	public function updateAction(Request $request, Job $job = null)
	{
		$form = $this->formFactory->create(JobType::class, $job);

		if ($request->isMethod('POST')) {
			$form->handleRequest($request);

			if ($form->isValid()) {
				$job = $form->getData();

				$this->save($job);

				return new RedirectResponse($this->urlGenerator->generate('admin_jobs'));
			}
		}

		$view =  $this->twig->render('admin_jobs/update.html.twig', [
			'form' => $form->createView(),
			'type' => 'add'
		]);

		$response = new Response();
		$response->setContent($view);

		return $response;
	}

	public function deleteAction(Job $job)
	{
		$this->entityManager->remove($job);
		$this->entityManager->flush();

		return new RedirectResponse($this->urlGenerator->generate('admin_jobs'));
	}
}
