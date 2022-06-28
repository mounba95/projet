<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'app_session')]
    public function index(Request $request): Response


    {

        $session= $request->getSession();

        if($session->has('nbreVisite')){
            $nbreVisite = $nbreVisite = $session->get('nbreVisite') + 1;
            $session->set('nbrVisite',$nbreVisite);
        }else{
            $nbreVisite = 1;
        }  $session->set('nbrVisite',$nbreVisite);

        return $this->render('session/index.html.twig');
    }
}
