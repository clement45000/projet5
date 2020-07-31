<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsController extends AbstractController
{
    /**
     * @Route("/client/article", name="show_posts")
     */
    public function index(PostRepository $repo,PaginatorInterface $paginatorInterface,Request $request)
    {
        
        $posts = $paginatorInterface->paginate(
            $repo->findAllPostWithPagination(),  
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );
       // $posts = $repo->findBy([],['id'=>'DESC']);
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
