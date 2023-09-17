<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user/validation', name: 'app_')]
class ValidationController extends AbstractController
{
    #[Route('/', name: 'validation')]
    public function index(): Response
    {
        return $this->render('validation/index.html.twig', [
            'controller_name' => 'ValidationController',
        ]);
    }
    
}
