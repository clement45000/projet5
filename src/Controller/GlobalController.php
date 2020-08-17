<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GlobalController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PostRepository $repository)
    {
        $lastposts = $repository->findBy([],['id'=>'DESC'],1);
        return $this->render('global/home.html.twig', [
            'lastposts' => $lastposts
        ]);
    }

     /**
     * @Route("/clien/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('global/contact.html.twig', [
      
        ]);
    }

      /**
     * @Route("/clien/weather", name="weather")
     */
    public function getWeatherbycity()
    {
        return $this->render('global/weather.html.twig', [
      
        ]);
    }

    /**
     * @Route("/clien/confidentialité", name="mentions_legales")
     */
    public function mentions()
    {
        return $this->render('global/mentions.html.twig', [
      
        ]);
    }
}
