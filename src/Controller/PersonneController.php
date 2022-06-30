<?php

namespace App\Controller;

use App\Entity\Personne;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class PersonneController extends AbstractController
{

    #[Route('/personne',name:'liste')]

    public function index(ManagerRegistry $doctrine): Response{
        $repository = $doctrine->getRepository(Personne::class);
        $personnes=$repository->findAll();

        return $this->render('personne/detail.html.twig',['personnes' =>$personnes]);
        
    }
    #[Route('/alls',name:'listes')]

    public function Allsindex(ManagerRegistry $doctrine): Response{
        $repository = $doctrine->getRepository(Personne::class);
        $personnes=$repository->findBy(['name' => 'Moussa']);

        return $this->render('personne/detail.html.twig',['personnes' =>$personnes]);
        
    }




    #[Route('/{id<\d+>}',name:'liste_detail')]

    public function detail(ManagerRegistry $doctrine, $id): Response{
        $repository = $doctrine->getRepository(Personne::class);
        $personne=$repository->find($id);
        if($personne){
            $this->addFlash('error', "la personne $id n'existe pas");
            return $this->redirectToRoute('personne');
        }
        return $this->render('personne/details.html.twig',['personne' =>$personne]);
        
    }

    #[Route('/add', name: 'personne')]
    public function addPersonne(ManagerRegistry $doctrine): Response
    {

        $entityManager = $doctrine->getManager();
        $personne = new Personne();

        $personne -> setFirstName('Moussa');
        $personne -> setName('Issa');
        $personne -> setAge('32');

        /* $personne2 = new Personne();

        $personne2 -> setFirstName('Kabir');
        $personne2 -> setName('lawan');
        $personne2 -> setAge('3');
 */
        $entityManager->persist($personne);
       // $entityManager->persist($personne2);
        $entityManager->flush();

        return $this->render('personne/detail.html.twig', [
            'personne' => $personne,
        ]);
    }
}
