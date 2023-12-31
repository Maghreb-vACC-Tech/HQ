<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Announcement;


class DashboardController extends AbstractController
{
    #[Route('/', name: 'app_dashboard')]
    public function index(ManagerRegistry $doctrine): Response
    {

        
        $repository = $doctrine->getRepository(Announcement::class);
        $announcement = $repository->findOneBy([], ['id' => 'DESC']);

        return $this->render('dashboard/index.html.twig', [
            'Latestannouncement' => $announcement,
        ]);


    }



}
