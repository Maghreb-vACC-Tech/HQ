<?php

namespace App\Controller;

use App\Entity\Announcement;
use App\Form\AnnouncementType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use \DateTime;


class AnnouncementController extends AbstractController
{

    // Show Announcement
        
        #[Route('/announcement', name: 'app_announcement')]
        public function Show(ManagerRegistry $doctrine): Response
        {

            $repository = $doctrine->getRepository(Announcement::class);
            $announcements = $repository -> findBy([], ['id' => 'DESC']);

            return $this->render('announcement/index.html.twig', [
                'announcements' => $announcements,
            ]);


            
        }   


    // ADD Announcement
        #[Route('/announcement/add/', name: 'app_announcement_add')]
        public function AddTraining(ManagerRegistry $doctrine ,Request $request): Response
        {


            // Set Trainee object
            $announcement = new Announcement();


            // Formulaire
        
            $form = $this->createForm(AnnouncementType::class, $announcement);
            // Viewing the form ends here
            // Create a new DateTime object with the current date and time
            $currentDateTime = new DateTime();

            // Format the DateTime object as a string
            $currentDateTimeString = $currentDateTime->format('Y-m-d H:i:s');

            $announcement -> setDate($currentDateTimeString);

            // Handling the request
            $form -> handleRequest($request);

            if($form -> isSubmitted()){

                // Import Doctrine
                $entityManager = $doctrine->getManager();

                // Add insert operation to transaction
                $entityManager->persist($announcement);

                // Execute the Transaction
                $entityManager -> flush();
                
                return $this->redirectToRoute('app_announcement');
            }
            else{

            }


            return $this->render('announcement/add.html.twig', [
                'announcement' => $announcement,
                'form' => $form->createView()
            ]);
            
        }



    
    // Delete Announcement
        
        #[Route('/announcement/delete/{id}', name: 'app_announcement_Delete')]
        public function Delete( Announcement $announcement = null , EntityManagerInterface $entityManager ): Response
        {

            if ($announcement){

                // Add transaction 
                $entityManager -> remove($announcement);

                $entityManager -> flush();
                

            }
            else {

            }


            return $this->redirectToRoute('app_announcement');


            
        }   


}
