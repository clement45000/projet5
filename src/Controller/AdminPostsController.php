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
      * @Route("/admin/article/{id}", name="update_post")
      */
     public function createAndUpdatePost(Post $post =null, Request $request, EntityManagerInterface $em)
     {
         if(!$post){ //Si l'article n'existe pas alors on en créer un 
             $post = new Post(); // creation de l'objet Post vide (sans valeur)
         }
         $formPost = $this->createForm(PostType::class, $post);
         $formPost->handleRequest($request);
         if($formPost->isSubmitted() && $formPost->isValid()){
             if(!$post->getId()){  //si l'id n'existe pas alors o, créer une date
                 $post->setCreateAt(new \DateTime());
             }
             $em->persist($post);
             $em->flush();

             return $this->redirectToRoute('admin_posts');
         }
         return $this->render('admin_posts/formposts.html.twig', [
             'post' => $post,
            'formPost'=> $formPost->createView(),
            'editMode' =>$post->getId() !== null // si l'id est présent alors la variable edit est vrai sinn on est sur l'ajout est elle est fausse
            //on va pouvoir écrire des conditions pou changer le titre ou faire apparaitre l'image si besoin
         ]);
     }
}
