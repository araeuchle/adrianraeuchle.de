<?php

namespace App\Controller;

use App\Entity\Job;
use App\Services\JobService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AdminJobController extends AbstractController
{
	/**
	 * @var JobService
	 */
	private $jobService;

	/**
	 * AdminJobsController constructor.
	 * @param JobService $jobService
	 */
	public function __construct(JobService $jobService)
	{
		$this->jobService = $jobService;
	}

	/**
     * @Route("/admin/jobs", name="admin_jobs")
     */
    public function index()
    {
        return $this->render('admin_jobs/index.html.twig', [
            'jobs' => $this->jobService->getJobs(),
        ]);
    }

	/**
	 * @Route("/admin/jobs/add",  name="admin_jobs_add")
	 */
    public function add(Request $request)
	{
		return $this->jobService->updateAction($request);
	}

	/**
	 * @ParamConverter("job", class="App\Entity\Job")
	 * @Route("/admin/jobs/edit/{job}",  name="admin_jobs_edit")
	 */
	public function edit(Job $job, Request $request)
	{
		return $this->jobService->updateAction($request, $job);
	}

	/**
	 * @ParamConverter("job", class="App\Entity\Job")
	 * @Route("/admin/jobs/delete/{job}",  name="admin_jobs_delete")
	 */
	public function delete(Job $job)
	{
		return $this->jobService->deleteAction($job);
	}
}
