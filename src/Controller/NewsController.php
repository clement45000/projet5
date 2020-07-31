<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsController extends AbstractController
{
    /**
     * @Route("/client/article", name="show_posts")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Post::class);
        $posts = $repo->findAll();
        return $this->render('news/news.html.twig', [
            'posts' => $posts
        ]);
    }

     /**
     * @Route("/client/article/{id}", name="show_post")
     */
    public function showPost($id)
    {
        $repo = $this->getDoctrine()->getRepository(Post::class);
        $post = $repo->find($id);
        return $this->render('news/post.html.twig', [
            'post' => $post
        ]);
    }
}
