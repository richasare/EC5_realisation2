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
use App\Entity\Message;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function newMessage(Request $request): Response
    {
        $message= new Message();
        $form = $this->createFormBuilder($message)
                ->add('email',EmailType::class)
                ->add('prenom',TextType::class)
                ->add('nom',TextType::class)
                ->add('message',TextType::class)
                ->add('Envoyer',SubmitType::class)
                ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush();

            /*mettre le return */
        }
        return $this->render('contact/contactForm.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
