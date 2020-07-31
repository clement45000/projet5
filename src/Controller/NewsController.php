<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsController extends AbstractController
{
    /**
     * @Route("/client/article", name="show_posts")
     */
    public function index(PostRepository $repo)
    {
        $posts = $repo->findAll();
        return $this->render('news/news.html.twig', [
            'posts' => $posts,
            "admin" =>false
        ]);
    }

     /**
     * @Route("/client/article/{id}", name="show_post")
     */
    public function showPost(Post $post)
    {
        return $this->render('news/post.html.twig', [
            'post' => $post
        ]);
    }
}
