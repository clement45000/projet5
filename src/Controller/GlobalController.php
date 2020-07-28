<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GlobalController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('global/home.html.twig', [
      
        ]);
    }

     /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('global/contact.html.twig', [
      
        ]);
    }
}
