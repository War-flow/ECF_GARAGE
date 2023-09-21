<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use App\Form\AvisType;
use App\Form\ServiceType;
use App\Repository\ServicesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'gestion_service_')]
class ServiceController extends AbstractController
{
    #[Route('/service', name: 'index')]
    public function index(ServicesRepository $servicesRepository): Response
    {
        $services = $servicesRepository->findBy([], []);

        return $this->render('admin/service/index.html.twig', compact('services'));
    }

    #[Route('/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        // On crée un "nouveau Service"
        $service = new Services();

        // On crée le formulaire
        $addForm = $this->createForm(ServiceType::class, $service);

        //On traiter la requête du formulaire
        $addForm->handleRequest($request);

        // On vérifier si le formulaire est soumis et valide
        if ($addForm->isSubmitted() && $addForm->isValid()) {

            // On stock
            $em->persist($service);
            $em->flush();

            $this->addFlash('success', 'Service ajouté avec succès');

            //On  rediriger
            return $this->redirectToRoute('gestion_service_index');
        }

        return $this->render('admin/service/add.html.twig', compact('addForm'));
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(Services $service, Request $request, EntityManagerInterface $em): Response
    {
        // On crée le formulaire
        $addForm = $this->createForm(ServiceType::class, $service);

        //On traiter la requête du formulaire
        $addForm->handleRequest($request);

        // On vérifier si le formulaire est soumis et valide
        if ($addForm->isSubmitted() && $addForm->isValid()) {

            // On stock entité
            $em->persist($service);
            $em->flush();

            $this->addFlash('success', 'Service modifier avec succès');

            //On  rediriger
            return $this->redirectToRoute('gestion_service_index');
        }

        return $this->render('admin/service/edit.html.twig', compact('addForm'));
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $em, int $id): Response
    {
        //On recupere id du service
        $service = $em->getRepository(Services::class)->find($id);

        // On supprime entité
        $em->remove($service);
        $em->flush();

        $this->addFlash('success', 'Service supprimé avec succès');

        //On  rediriger
        return $this->redirectToRoute('gestion_service_index');
    }
}
