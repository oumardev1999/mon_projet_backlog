<?php

namespace App\Controller;

use App\Entity\Partenaires;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PartenairesType;



class PageController extends AbstractController
{
   
    public function __construct(ManagerRegistry $mr){
        $this->mr = $mr;
    }
    private $mr;
    #[Route('/page', name: 'app_page')]
    public function index(Request $request) {
        $Partenaire = new Partenaires();

        $entityManager = $this->mr->getManager();

        $form = $this->CreateForm(PartenairesType::class, $Partenaire);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isvalid()){
            $partenaire = $form->getData();

            $entityManager->persist($partenaire);

            $entityManager->flush();
            return $this->redirectToRoute('app_page');
        }  
        return $this->render('page/index.html.twig', [

            'form'  => $form->createView()
        ] );
    }

    #[Route('/ajout', name: 'app_ajout_partenaire')]
    public function ajout_partenaire(): Response
    {
        $partenaires = $this->mr->getRepository(partenaires::class)->findAll();
    
        return $this->render('page/ajout_partenaire.html.twig',[
         'partenaires' => $partenaires
        ]);
    }
}
