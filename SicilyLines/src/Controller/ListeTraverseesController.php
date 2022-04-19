<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TraverseeRepository;
use App\Entity\Traversee;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Type;
use App\Entity\Periode;
use App\Repository\TypeRepository;
use App\Repository\PeriodeRepository;
use App\Repository\TariferRepository;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ListeTraverseesController extends AbstractController
{
    /**
     * @Route("/liste/traversees", name="liste_traversees")
     */
    public function findTraversee(TraverseeRepository $traversees): Response
    {
        $traversees = $this->getDoctrine()
        ->getRepository(Traversee::class)
        ->findAll();

        return $this->render('liste_traversees/index.html.twig', [
            'traversees' => $traversees,
        ]);
    }

   

    public function choixPassager(TariferRepository $tariferRepository, PeriodeRepository $periodeRepository, Request $request, $liaisonId) : Response {
        $form = $this->createFormBuilder()
        ->add('A1', IntegerType::class,[
            'required' => true,
            'label' => "Adulte",
        ])
        ->add('A2', IntegerType::class,[
            'required' => true,
            'label' => "Enfant 8 à 18 ans",
        ])
        ->add('A3',IntegerType::class,[
            'required' => true,
            'label' => "Enfant 0 à 7 ans",
        ])
        ->add('B1',IntegerType::class,[
            'required' => true,
            'label' => "Voiture long. inférieur à 4m",
        ])
        ->add('B2',IntegerType::class,[
            'required' => true,
            'label' => "Voiture long. inférieur à 5m",
        ])
        ->add('C1',IntegerType::class,[
            'required' => true,
            'label' => "Fourgon",
        ])
        ->add('C2',IntegerType::class,[
            'required' => true,
            'label' => "Camping car",
        ])
        ->add('C3',IntegerType::class,[
            'required' => true,
            'label' => "Camion",
        ])

        ->add('valider',SubmitType::class)

        ->getForm();

        if($form->isSubmitted()){
            $nbPassA1 = $data['A1'];
            $nbPassA2 = $data['A2'];
            $nbPassA3 = $data['A3'];
            $nbPassB1 = $data['B1'];
            $nbPassB2 = $data['B2'];
            $nbPassC1 = $data['C1'];
            $nbPassC2 = $data['C2'];
            $nbPassC3 = $data['C3'];
        }

        //$periodeId=$periodeRepository->getId();
        //$listTarif=$tariferRepository->getTarifTraversee($liaisonId, $periodeId);

        //calcul tarif en fonction de ce que l'utilisateur  rempli
        //$tarifTotal=$nbPassA1*$listTarif[0]['tarif']+$nbPassA2*$listTarif[1]['tarif']+$nbPassA3*$listTarif[2]['tarif']+$nbPassB1*$listTarif[3]['tarif']+$nbPassB2*$listTarif[4]['tarif']+$nbPassC1*$listTarif[5]['tarif']+$nbPassC2*$listTarif[6]['tarif']+$nbPassC3*$listTarif[7]['tarif'];

    
        return $this->render('liste_traversees/formPassagers.html.twig',
                ['form'=>$form->createView() /*'tarifTotal'=>$tarifTotal*/]);
    }
    
}
