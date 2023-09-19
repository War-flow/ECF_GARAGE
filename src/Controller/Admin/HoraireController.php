<?php

namespace App\Controller\Admin;

use App\Entity\Horaires;
use App\Form\HorairesType;
use App\Repository\HorairesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'gestion_horaire_')]
class HoraireController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(HorairesRepository $horairesRepository): Response
    {
        $horaires = $horairesRepository->findBy([], []);
        return $this->render('admin/horaire/index.html.twig', compact('horaires'));
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(Horaires $horaires, Request $request, EntityManagerInterface $em): Response
    {
        // On crée le formulaire
        $addForm = $this->createForm(HorairesType::class, $horaires);

        //On traiter la requête du formulaire
        $addForm->handleRequest($request);

        // On vérifier si le formulaire est soumis et valide
        if ($addForm->isSubmitted() && $addForm->isValid()) {

            // On stock entité
            $em->persist($horaires);
            $em->flush();

            $this->addFlash('success', 'Horaire modifier avec succès');

            //On  rediriger
            return $this->redirectToRoute('gestion_horaire_index');
        }

        return $this->render('admin/horaire/edit.html.twig', compact('addForm'));
    }
}
