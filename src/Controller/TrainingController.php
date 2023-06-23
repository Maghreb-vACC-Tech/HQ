<?php

namespace App\Controller;

// Use Entities
use App\Entity\Trainee;
use App\Form\TraineeType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingController extends AbstractController
{

//////////////////////////////////////Displays trainees////////////////////////////////////////////////

    #[Route('/training', name: 'app_training')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $repository = $doctrine->getRepository(Trainee::class);
        $trainees = $repository -> findAll();

        return $this->render('training/index.html.twig', [
            'trainees' => $trainees,
        ]);


        
    }   




//////////////////////////////////////Add trainees////////////////////////////////////////////////

    #[Route('/training/add/', name: 'app_training_add')]
    public function AddTraining(ManagerRegistry $doctrine ,Request $request): Response
    {


        // Set Trainee object
        $trainee = new Trainee();


        // Formulaire
    
        $form = $this->createForm(TraineeType::class, $trainee);
        // Viewing the form ends here


        // Handling the request
        $form -> handleRequest($request);

        if($form -> isSubmitted()){

            // Import Doctrine
            $entityManager = $doctrine->getManager();

            // Add insert operation to transaction
            $entityManager->persist($trainee);

            // Execute the Transaction
            $entityManager -> flush();
            
            return $this->redirectToRoute('app_training');
        }
        else{

        }


        return $this->render('training/add.html.twig', [
            'trainee' => $trainee,
            'form' => $form->createView()
        ]);
    }




//////////////////////////////////////Delete trainees////////////////////////////////////////////////

    #[Route('/training/delete/{CID}/{Name}/{Rating}/{Mentor}/{Comment}', name: 'app_training_delete')]
    public function DeleteTrainee(Trainee $trainee = null ,ManagerRegistry $doctrine ,$CID ,$Name ,$Rating ,$Mentor ,$Comment): Response
    {

        if ($trainee){


            // Add transaction 
            $trainee -> setCID($CID);
            $trainee -> setName($Name);
            $trainee -> setRating($Rating);
            $trainee -> setMentor($Mentor);
            $trainee -> setComment($Comment);

            $manager = $doctrine -> getManager(); 
            $manager -> persist($trainee);

            $manager -> flush();

        }
        else {

        }


        return $this->redirectToRoute('app_training');


        
    } 




//////////////////////////////////////Modify trainees////////////////////////////////////////////////

    #[Route('/training/Modify/{id}', name: 'app_training_modify')]
    public function ModifyTrainee(ManagerRegistry $doctrine): Response
    {

        $repository = $doctrine->getRepository(Trainee::class);
        $trainees = $repository -> findAll();

        return $this->render('training/index.html.twig', [
            'trainees' => $trainees,
        ]);


        
    } 


}