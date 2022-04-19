<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class ConnexionController extends AbstractController
{
    /**
     * @Route("/connexion", name="connexion")
     */
    public function formulaireConnexion(): Response
    {
        $form = $this->createFormBuilder()
                    ->add('login', TextType::class)
                    ->add('motDePasse', PasswordType::class)
                    ->add('Valider',SubmitType::class)
                    ->add('annuler',ResetType::class)
                    ->getForm();
        
        
        $request = Request::createFromGlobals(); // sauf si en paramètre de la 
  							//méthode,on a Request $request
        $form->handleRequest($request) ;
        // Le visiteur a appuyé sur le bouton Valider
	   // et les données saisies sont conformes à la validation des champs
        if ($form->isSubmitted() && $form->isValid()) {	
         

           $data = $form->getData() ;
           
           // Traitement du formulaire
           return $this->render('connexion/formConnecter.html.twig',
                            array('data'=>$data));
        }
        
	  // Affichage du formulaire
        return $this->render('connexion/formConnexion.html.twig',
                ['form'=>$form->createView()]);

        //return $this->render('connexion/formConnexion.html.twig', [
          //  'controller_name' => 'ConnexionController',
        //]);
    }

  

}
