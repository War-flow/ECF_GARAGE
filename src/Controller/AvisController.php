<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function index(AvisRepository $avisRepository, Request $request, PaginatorInterface $paginator, EntityManagerInterface $em): Response
    {
        $pagination = $paginator->paginate(
            $avisRepository->paginationAvis(),
            $request->query->get('page', 1),
            5
        );
         // On crée un "nouveau menus"
         $avis = new Avis();

         // On crée le formulaire
         $form = $this->createForm(AvisType::class, $avis);
 
         //On traiter la requête du formulaire
         $form->handleRequest($request);
 
         // On vérifier si le formulaire est soumis et valide
         if ($form->isSubmitted() && $form->isValid()) {
 
             // On stock entitéf
             $em->persist($avis);
             $em->flush();
 
             $this->addFlash('success', 'Merci pour votre Commentaire');
 
             //On  redirigerp$_io
             return $this->redirectToRoute('app_avis');
         }

        return $this->render('avis/index.html.twig', [
            'avis' =>  $pagination,
            'form' => $form
        ]);
    }
}
