<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminPostsController extends AbstractController
{
    /**
     * @Route("/admin/article", name="admin_posts")
     */
    public function index(PostRepository $repo,PaginatorInterface $paginatorInterface,Request $request)
    {
        $posts = $paginatorInterface->paginate(
            $repo->findAllPostWithPagination(),    
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );
        return $this->render('news/news.html.twig', [
            'posts' => $posts,
            "admin" =>true
        ]);
    }
}
