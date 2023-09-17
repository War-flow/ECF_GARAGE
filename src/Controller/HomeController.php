<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Voitures;
use App\Form\ContactType;
use App\Repository\ServicesRepository;
use App\Repository\VoituresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_')]
class HomeController extends AbstractController
{
    #[Route('', name: 'home')]
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

    #[Route('/detail/{slug}', name: 'detail')]
    public function détail(Voitures $slug, VoituresRepository $voituresRepository, Request $request, EntityManagerInterface $em): Response
    {
        // On va chercher le numéro de page dans l'url
        $page = $request->query->getInt('page', 1);

        $voitures = $voituresRepository->findCarsPaginated($page, $slug->getId(), 4);

        $contact = new Contact();

        $addForm = $this->createForm(ContactType::class, $contact);

        $addForm->handleRequest($request);

        if ($addForm->isSubmitted() && $addForm->isValid()) {

            // On stock entité
            $em->persist($contact);
            $em->flush();

            $this->addFlash('success', 'Demande envoyé');

            //On  rediriger
            return $this->redirectToRoute('app_home');
        }
        
        return $this->render('détail/index.html.twig', compact('slug', 'voitures', 'addForm'));
    }
}
