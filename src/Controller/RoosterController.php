<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoosterController extends AbstractController
{
    #[Route('/rooster', name: 'app_rooster')]
    public function index(): Response
    {
        return $this->render('rooster/index.html.twig', [
            
        ]);
    }
}
