<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GlobalController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);
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
}
