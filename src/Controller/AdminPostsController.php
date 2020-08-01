<?php

namespace App\Controller;

use DateTime;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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

     /**
      * @Route("/admin/article/addpost", name="add_post")
      */
     public function createAndUpdatePost(Post $post =null, Request $request, EntityManagerInterface $em)
     {
         if(!$post){
             $post = new Post();
         }
         $form = $this->createForm(PostType::class, $post);
         $form->handleRequest($request);

         if($form->isSubmitted() && $form->isValid()){
             if(!$post->getId()){
                 $post->setCreateAt(new \DateTime());
             }
             $em->persist($post);
             $em->flush();

             return $this->redirectToRoute('admin_posts');
         }
         return $this->render('admin_posts/formposts.html.twig', [
            'formPost'=> $form->createView(),
            'editMode' =>$post->getId() !== null
         ]);
     }
}
