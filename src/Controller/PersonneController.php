<?php

namespace App\Controller;

use App\Entity\Personne;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    #[Route('/personne/add', name: 'personne')]
    public function addPersonne(ManagerRegistry $doctrine): Response
    {

        $entityManager = $doctrine->getManager();
        $personne = new Personne();

        $personne -> setFirstName('Moussa');
        $personne -> setName('Issa');
        $personne -> setAge('32');

        $entityManager->persist($personne);

        return $this->render('personne/detail.html.twig', [
            'personne' => $personne,
        ]);
    }
}
