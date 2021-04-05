<?php

namespace App\Controller;

use App\Entity\User; //inclure l'entité user

use App\Services\ExempleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(ExempleService $exempleService): Response
    {

        $result =$exempleService->hello();

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * chemin de l'url et alias
     * @Route("/user/math/{nbr}", name="math_nbr")
     * @return Response
     */
    public function math(int $nbr): Response
    {


        return  $this->render('/user/math/nbr.html.twig', [
            'nbr' => $nbr
        ]);
    }
}
