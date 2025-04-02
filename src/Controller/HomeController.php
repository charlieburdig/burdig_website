<?php

// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        // Vous pouvez passer des variables à la vue ici
        $title = "Bienvenue sur notre site web !";

        return $this->render('base.html.twig', [
            'title' => $title,
        ]);
    }
}
