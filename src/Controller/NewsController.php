<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/client/news", name="news")
     */
    public function index()
    {
        return $this->render('news/news.html.twig', [
        ]);
    }
}
