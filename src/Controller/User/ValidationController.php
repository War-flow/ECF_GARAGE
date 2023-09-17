<?php

namespace App\Controller\User;

use App\Entity\Avis;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user/validation', name: 'app_')]
class ValidationController extends AbstractController
{
    #[Route('/', name: 'validation')]
    public function index(AvisRepository $avisRepository): Response
    {

    return $this->render('validation/index.html.twig', [
        'validation' => $avisRepository->findBy([], [])
    ]);
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(EntityManagerInterface $em, int $id): Response
    {
        //On recupere id de l'avis
        $avis = $em->getRepository(Avis::class)->find($id);

        if(!$avis) {
            throw $this->createNotFoundException(
                'Aucun avis trouvé'.$id
            );
        }

        // On supprime entité
        $avis->setValidation('validé');
        $em->flush();

        $this->addFlash('success', 'Avis supprimé avec succès');

        //On  rediriger
        return $this->redirectToRoute('app_validation');
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $em, int $id): Response
    {
        //On recupere id de l'avis
        $avis = $em->getRepository(Avis::class)->find($id);

        // On supprime entité
        $em->remove($avis);
        $em->flush();

        $this->addFlash('success', 'Avis supprimé avec succès');

        //On  rediriger
        return $this->redirectToRoute('app_validation');
    }
    
}
