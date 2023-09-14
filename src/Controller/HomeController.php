<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Repository\ServicesRepository;
use App\Repository\VoituresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ServicesRepository $servicesRepository,VoituresRepository $voituresRepository ): Response
    {
        return $this->render('home/index.html.twig', [
            'services' => $servicesRepository->findBy([],[]),
            'voitures' => $voituresRepository->findBy([],[])
        ]);
    
    }

   // #[Route('/d/tail/{slug}', name: 'app_d_tail')]
    //public function détail(Voitures $slug, VoituresRepository $voituresRepository, Request $request): Response
   // {
        // On va chercher le numéro de page dans l'url
    //    $page = $request->query->getInt('page',1);
    
        // On va chercher la liste des plats de la catégories
    //    $plats = $->findPlatsPaginated($page , $slug->getId(), 4);
        
    //    return $this->render('carte/cate.html.twig', compact('slug','plats'));
    //}
}