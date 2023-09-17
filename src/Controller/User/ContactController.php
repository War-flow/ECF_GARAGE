<?php

namespace App\Controller\User;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contact', name: 'app_user_')]
class ContactController extends AbstractController
{
    #[Route('', name: 'contact')]
    public function index(ContactRepository $contactRepository, Request $request, PaginatorInterface $paginator): Response
    {
        // Récuperation des véhicule dans la base 
        $pagination = $paginator->paginate(
            $contactRepository->paginationContact(),
            $request->query->get('page', 1),
            10
        );

        return $this->render('contact/index.html.twig', [
            'pagination' => $pagination
        ]);
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $em, int $id): Response
    {
        //On recupere id de l'avis
        $contact = $em->getRepository(Contact::class)->find($id);

        // On supprime entité
        $em->remove($contact);
        $em->flush();

        $this->addFlash('success', 'Demande supprimé avec succès');

        //On  rediriger
        return $this->redirectToRoute('app_user_dcontact');
    }
}
