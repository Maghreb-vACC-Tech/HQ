<?php

namespace App\Controller;

// Use Entities
use App\Entity\Trainee;
use App\Form\ModifyTraineeType;
use App\Form\TraineeType;
use Doctrine\ORM\EntityManagerInterface;
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

    #[Route('/training/delete/{id}', name: 'app_training_delete')]
    public function DeleteTrainee(Trainee $trainee = null ,EntityManagerInterface $entityManager): Response
    {

        if ($trainee){

            // $manager = $entityManager -> getManager(); 

            // Add transaction 
            $entityManager -> remove($trainee);

            $entityManager -> flush();
            

        }
        else {

        }


        return $this->redirectToRoute('app_training');


        
    } 




//////////////////////////////////////Modify trainees////////////////////////////////////////////////

    #[Route('/training/Modify/{id}', name: 'app_training_modify')]
    public function ModifyTrainee(Trainee $trainee = null ,Request $request ,ManagerRegistry $doctrine ,$id): Response
    {

        $trainee = new Trainee();

    
        
        $entityManager = $doctrine -> getManager(); 

        $trainee = $entityManager->getRepository(Trainee::class)->find($id);

        $form = $this->createForm(ModifyTraineeType::class, $trainee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
    
            return $this->redirectToRoute('app_training');
        }
        $trainee = $trainee -> getCID();
        

        return $this->render('training/modify.html.twig', [
            'trainee' => $trainee,
            'form' => $form->createView(),
        ]);

    } 


//////////////////////////////////////Search trainees////////////////////////////////////////////////

    // #[Route('/training/find/{cid}', name: 'app_training_find')]
    // public function FindTrainee($cid,Trainee $trainee = null ,Request $request ,ManagerRegistry $doctrine): Response
    // {

    //     $repository = $doctrine->getRepository(Trainee::class);
    //     // $trainees = $repository -> findb();
    //     // $trainee = $repository->find();
    //     $trainee = $repository->findBy(['CID' => $cid]);

    //     return $this->render('training/index.html.twig', [
    //         'trainees' => $trainee,
    //     ]);


        
    // }   



}