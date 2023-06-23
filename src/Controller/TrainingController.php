<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingController extends AbstractController
{
    #[Route('/training', name: 'app_training')]
    public function index(): Response
    {
        return $this->render('training/index.html.twig', [
            'controller_name' => 'TrainingController',
        ]);
    }   

    #[Route('/training/add', name: 'app_training_add')]
    public function AddTraining(): Response
    {
        return $this->render('training/add.html.twig', [
            'controller_name' => 'TrainingAddController',
            'phpinfo' => phpinfo()
        ]);
    }

}
