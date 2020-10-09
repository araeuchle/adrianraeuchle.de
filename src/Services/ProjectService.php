<?php
namespace App\Services;

use App\Entity\Project;
use App\Form\ProjectType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class ProjectService
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
     * ProjectService constructor.
     * @param EntityManagerInterface $entityManager
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     */
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

    /**
	 * @return mixed
	 */
	public function getProjects()
	{
		return $this->entityManager
			->getRepository(Project::class)
			->findAll();
	}

	public function save(Project $project)
    {
        $this->entityManager->persist($project);
        $this->entityManager->flush();
    }

    public function updateAction(Request $request, Project $project = null)
    {
        $form = $this->formFactory->create(ProjectType::class, $project);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $project = $form->getData();

                $this->save($project);

                return new RedirectResponse($this->urlGenerator->generate('admin_projects'));
            }
        }

        $view = $this->twig->render('admin_projects/update.html.twig', [
            'form' => $form->createView(),
            'type' => $project === null ? 'add' : 'edit'
        ]);

        $response = new Response();
        $response->setContent($view);

        return $response;
    }

    public function deleteAction(Project $project)
    {
        $this->entityManager->remove($project);
        $this->entityManager->flush();

        return new RedirectResponse($this->urlGenerator->generate('admin_projects'));
    }
}
