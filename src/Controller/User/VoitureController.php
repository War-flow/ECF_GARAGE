<?php

namespace App\Controller\User;

use App\Entity\Image;
use App\Entity\Voitures;
use App\Form\VoituresType;
use App\Service\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user/voiture', name: 'app_user_')]
class VoitureController extends AbstractController
{

    #[Route('/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em, PictureService $pictureService): Response
    {
        // On crée un "nouveau menus"
        $voiture = new Voitures();

        // On crée le formulaire
        $addForm = $this->createForm(VoituresType::class, $voiture);

        //On traiter la requête du formulaire
        $addForm->handleRequest($request);

        // On vérifier si le formulaire est soumis et valide
        if ($addForm->isSubmitted() && $addForm->isValid()) {

            // On récupère les images
            $images = $addForm->get('image')->getData();
            
            foreach($images as $image) {

                // On défint le dossier de destination
                $folder = 'voitures';

                //on appelle le service d'ajout;
                $fichier = $pictureService->add($image, $folder, 250, 250);

                $img = new Image();
                $img->setName($fichier);
                $voiture->addImage($img);
            }

            // On stock entité
            $em->persist($voiture);
            $em->flush();

            $this->addFlash('success', 'Véhicule ajouté avec succès');

            //On  rediriger
            return $this->redirectToRoute('app_home');
        }

        return $this->render('voiture/index.html.twig', compact('addForm'));
    }

}
