<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductsController extends AbstractController
{
    /**
     * @Route("/products", name="products")
     */
    public function index(ProductRepository $repository,PaginatorInterface $paginatorInterface, Request $request)
    {
        $products = $paginatorInterface->paginate(
            $repository->findAllWithPagination(),
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit per page*/
        );
        return $this->render('products/allproducts.html.twig', [
            'products' => $products,
            "admin" =>false  //  renvoit false pour ne pas afficher les boutons supprimer ajouter et modifier sur le template
        ]);
    }

    /**
     * @Route("/products/boulangerie/{categoryprod_id}", name="boulangeries")
     */
    public function boulangerie(ProductRepository $repository,$categoryprod_id)
    {
        $products = $repository->getProductById($categoryprod_id);
        if($categoryprod_id !== '33' ){
            return $this->render('bundles/TwigBundle/Exception/error404.html.twig', [
            ]);
        }else{
            return $this->render('products/boulangeries.html.twig', [
                'products' => $products,
            ]);
        }
    }

    /**
     * @Route("/products/patisserie/{categoryprod_id}", name="patisseries")
     */
    public function patisseries(ProductRepository $repository,$categoryprod_id)
    {
        $products = $repository->getProductById($categoryprod_id);
        if($categoryprod_id !== '32' ){
            return $this->render('bundles/TwigBundle/Exception/error404.html.twig', [
            ]);
        }else{
            return $this->render('products/patisseries.html.twig', [
            'products' => $products,
        ]);
        }
       
    }

     /**
     * @Route("/products/viennoiserie/{categoryprod_id}", name="viennoiseries")
     */
    public function viennoiserie(ProductRepository $repository,$categoryprod_id)
    {
        $products = $repository->getProductById($categoryprod_id);
        if($categoryprod_id !== '34' ){
            return $this->render('bundles/TwigBundle/Exception/error404.html.twig', [
            ]);
        }else{

            return $this->render('products/viennoiseries.html.twig', [
                'products' => $products,
            ]);  
        }
        
    }

     /**
     * @Route("/products/sandwich/{categoryprod_id}", name="sandwichs")
     */
    public function sandwich(ProductRepository $repository,$categoryprod_id)
    {
        $products = $repository->getProductById($categoryprod_id);
        if($categoryprod_id !== '35' ){
            return $this->render('bundles/TwigBundle/Exception/error404.html.twig', [
            ]);
        }else{
            return $this->render('products/sandwichs.html.twig', [
                'products' => $products,
            ]);    
        }
        
    }

     /**
     * @Route("/products/salade/{categoryprod_id}", name="salades")
     */
    public function salade(ProductRepository $repository,$categoryprod_id)
    {
        $products = $repository->getProductById($categoryprod_id);
        if($categoryprod_id !== '36' ){
            return $this->render('bundles/TwigBundle/Exception/error404.html.twig', [
            ]);
        }else{
            return $this->render('products/salades.html.twig', [
            'products' => $products,
             ]);
        }
    }

    /**
     * @Route("/products/wrap/{categoryprod_id}", name="wraps")
     */
    public function wrap(ProductRepository $repository,$categoryprod_id)
    {   
        $products = $repository->getProductById($categoryprod_id);
        if($categoryprod_id !== '37' ){
            return $this->render('bundles/TwigBundle/Exception/error404.html.twig', [
            ]);
        }else{
            return $this->render('products/wraps.html.twig', [
                'products' => $products,
            ]);
        }
    }
}
