<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HourController extends AbstractController
{
    #[Route('/hour', name: 'app_hour')]
    public function index(): Response
    {
        return $this->render('hour/index.html.twig', [
            'controller_name' => 'HourController',
        ]);
    }
}
