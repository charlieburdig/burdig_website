<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Form\ContactType;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        // Créer une instance du formulaire
        $form = $this->createForm(ContactType::class);

        // Traiter la requête du formulaire
        $form->handleRequest($request);

        // Vérifier si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {

            // Récupérer les données du formulaire
            $data = $form->getData();
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $name = $firstname . ' ' . $lastname;
            $phone = $data['phone'];
            $email = $data['email'];
            $budget = $data['budget'];
            $message = $data['message'];

            // Créer l'email avec les informations du formulaire
            $emailMessage = (new Email())
                ->from($email) 
                ->to('nicolas@burdig.ca') 
                ->subject('Message de contact - Travailler avec nous')
                ->text("Nom : $name\nEmail : $email\n$phone\n$budget$\n\n$message");

            // Envoyer l'email
            $mailer->send($emailMessage);

            // Afficher un message de confirmation
            $this->addFlash('success', 'Votre message a été envoyé avec succès.');

            // Rediriger vers la page de contact ou afficher une confirmation
            return $this->redirectToRoute('contact');
        }

        // Rendre la vue avec le formulaire
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
