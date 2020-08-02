<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\PostRepository;

use Doctrine\ORM\EntityManagerInterface;
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
    public function showPost(Post $post, Request $request,EntityManagerInterface $em)
    {
        $comment = new Comment();

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $comment->setCreatedAt(new \DateTime())
                    ->setPost($post);

            $em->persist($comment);
            $em->flush();

        return $this->redirectToRoute('show_post', ['id' => $post->getId()]);    
        }

        return $this->render('news/post.html.twig', [
            'post' => $post,
            'commentForm' => $form->createView()
        ]);
    }
}
