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
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use App\Entity\Utilisateur;
class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function newUser(Request $request): Response
    {
        $utilisateur= new Utilisateur();
        $form = $this->createFormBuilder($utilisateur)
                ->add('nom',TextType::class)
                ->add('prenom',TextType::class)
                ->add('mail',EmailType::class)
                ->add('mdp',PasswordType::class)
                ->add('valider',SubmitType::class)
                ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush();
        }

        return $this->render('inscription/index.html.twig',
                ['form'=>$form->createView()]);

    }
}

