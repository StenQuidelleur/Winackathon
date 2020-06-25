<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/user", name="home_index")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/agenda/{id}", name="agenda")
     */
    public function agenda($id)
    {
        return $this->render('home/agenda.html.twig');
    }
  
    /**
     * @Route("/drone", name="drone")
     */
    public function drone()
    {
        return $this->render('drone/drone.html.twig');
    }

}
