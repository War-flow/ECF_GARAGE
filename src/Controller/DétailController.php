<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DétailController extends AbstractController
{
    #[Route('/d/tail', name: 'app_d_tail')]
    public function index(): Response
    {
        return $this->render('détail/index.html.twig', [
            'controller_name' => 'DétailController',
        ]);
    }
}
