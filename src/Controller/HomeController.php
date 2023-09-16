<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Repository\ServicesRepository;
use App\Repository\VoituresRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ServicesRepository $servicesRepository, VoituresRepository $voituresRepository, Request $request, PaginatorInterface $paginator): Response
    {
        // Récuperation des véhicule dans la base 
            $pagination = $paginator->paginate(
            $voituresRepository->paginationHome(),
            $request->query->get('page', 1),
            9
        );

        return $this->render('home/index.html.twig', [
            'services' => $servicesRepository->findBy([], []),
            'pagination' => $pagination
        ]);
    }

    #[Route('/detail/{slug}', name: 'app_detail')]
    public function détail(Voitures $slug, VoituresRepository $voituresRepository, Request $request): Response
    {
        // On va chercher le numéro de page dans l'url
        $page = $request->query->getInt('page', 1);

        $voitures = $voituresRepository->findCarsPaginated($page, $slug->getId(), 4);

        return $this->render('détail/index.html.twig', compact('slug', 'voitures'));
    }
}
