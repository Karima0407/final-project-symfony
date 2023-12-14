<?php

namespace App\Controller;

use App\Entity\Vetements;
use App\Form\VetementsType;
use App\Repository\VetementsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VetementsController extends AbstractController
{
    #[Route('/vetements', name: 'app_vetements')]
    public function ajout_vetement(Request $request, EntityManagerInterface $entityManager, VetementsRepository $vetementsRepository): Response
    {
        $vetement = new Vetements();
        $selects = $vetementsRepository->findAll();
        $form = $this->createForm(VetementsType::class, $vetement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('image')->getData();
            $newFilename = md5(uniqid()) . '.' . $uploadedFile->guessExtension();

            // Déplacez le fichier vers le répertoire où vous souhaitez le stocker
            $uploadedFile->move(
                $this->getParameter('img_directory'),
                $newFilename
            );
            // Enregistrement de nom de fichier dans la table de la BD
            $vetement->setImage($newFilename);
            $entityManager->persist($vetement);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }

        return $this->render('vetements/vetements.html.twig', [
            'controller_name' => 'VetementsController',
            'vetement' => $form->createView(),
            'select' => $selects,
        ]);
    }

    #[Route('/liste-vetements', name: 'app_liste_vetements')]
    public function liste_vetements(VetementsRepository $vetementsRepository): Response
    {
        $selects = $vetementsRepository->findAll();

        return $this->render('vetements/liste_vetements.html.twig', [
            'selects' => $selects,
        ]);
    }
}
