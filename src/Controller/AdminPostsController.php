<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminPostsController extends AbstractController
{
    /**
     * @Route("/admin/article", name="admin_posts")
     */
    public function index(PostRepository $repo)
    {
        $posts = $repo->findAll();
        return $this->render('news/news.html.twig', [
            'posts' => $posts,
            "admin" =>true
        ]);
    }
}
