<?php
namespace App\Services;

use App\Entity\Skill;
use App\Form\SkillType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class SkillService
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

	public function getSkills()
	{
		return $this->entityManager
			->getRepository(Skill::class)
			->findBy([], ['rating' => 'DESC']);
	}

	public function save(Skill $skill)
    {
        $this->entityManager->persist($skill);
        $this->entityManager->flush();
    }

    public function updateAction(Request $request, Skill $skill = null)
    {
        $form = $this->formFactory->create(SkillType::class, $skill);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $skill = $form->getData();

                $this->save($skill);

                return new RedirectResponse($this->urlGenerator->generate('admin_skills'));
            }
        }

        $view = $this->twig->render('admin_skills/update.html.twig', [
            'form' => $form->createView(),
            'type' => $skill === null ? 'add' : 'edit'
        ]);

        $response = new Response();
        $response->setContent($view);

        return $response;
    }

    public function deleteAction(Skill $skill)
    {
        $this->entityManager->remove($skill);
        $this->entityManager->flush();

        return new RedirectResponse($this->urlGenerator->generate('admin_skills'));
    }
}
