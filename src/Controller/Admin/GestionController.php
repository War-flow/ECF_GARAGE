<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'app_admin_')]
class GestionController extends AbstractController
{
    #[Route('/gestion', name: 'gestion')]
    public function index(): Response
    {
        return $this->render('admin/gestion/index.html.twig');
    }
}
