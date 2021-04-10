<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DataPrivacyController extends AbstractController
{
    /**
     * @Route("/data/privacy", name="data_privacy")
     */
    public function index()
    {
        return $this->render('data_privacy/index.html.twig');
    }
}
