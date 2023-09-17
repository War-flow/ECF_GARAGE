<?php

namespace App\Controller\User;

use App\Entity\Voitures;
use App\Form\VoituresType;
use App\Repository\VoituresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user/voiture', name: 'app_user_')]
class VoitureController extends AbstractController
{

    #[Route('/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        // On crée un "nouveau menus"
        $menu = new Voitures();

        // On crée le formulaire
        $addForm = $this->createForm(VoituresType::class, $menu);

        //On traiter la requête du formulaire
        $addForm->handleRequest($request);

        // On vérifier si le formulaire est soumis et valide
        if ($addForm->isSubmitted() && $addForm->isValid()) {

            // On stock entité
            $em->persist($menu);
            $em->flush();

            $this->addFlash('success', 'Véhicule ajouté avec succès');

            //On  rediriger
            return $this->redirectToRoute('app_home');
        }

        return $this->render('voiture/index.html.twig', compact('addForm'));
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(Voitures $voitures, Request $request, EntityManagerInterface $em): Response
    {
        // On crée le formulaire
        $addForm = $this->createForm(MenuFormType::class, $voitures);

        //On traiter la requête du formulaire
        $addForm->handleRequest($request);

        // On vérifier si le formulaire est soumis et valide
        if ($addForm->isSubmitted() && $addForm->isValid()) {

            // On stock entité
            $em->persist($voitures);
            $em->flush();

            $this->addFlash('success', 'Menu modifier avec succès');

            //On  rediriger
            return $this->redirectToRoute('app_home');
        }

        return $this->render('admin/menu/edit.html.twig', compact('addForm'));
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $em, int $id): Response
    {
        //On recupere id du menu
        $voiture = $em->getRepository(Voitures::class)->find($id);

        // On supprime entité
        $em->remove($voiture);
        $em->flush();

        $this->addFlash('success', 'Menu supprimé avec succès');

        //On  rediriger
        return $this->redirectToRoute('app_home');
    }

}
