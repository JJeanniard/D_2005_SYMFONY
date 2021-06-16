<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class YoutubeController extends AbstractController
{
    /**
     * @Route("/youtube", name="youtube")
     */
    public function index(): Response
    {
        return $this->render('youtube/index.html.twig', [
            'controller_name' => 'YoutubeController',
        ]);
    }

    /**
     * @Route("/youtube/login", name="youlogin")
     */
    public function login(): Response
    {
        return $this->render('youtube/login.html.twig');
    }

    /**
     * @Route("/youtube/logout")
     */
    public function logout(){
        return $this->render('youtube/logout.html.twig');
    }
}
