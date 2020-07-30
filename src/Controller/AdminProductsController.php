<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminProductsController extends AbstractController
{
    /**
     * @Route("/admin/products", name="admin_products")
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
            "admin" => true  //renvoit true pour  afficher les boutons supprimer ajouter et modifier sur le template
        ]);
    }

     /**
     * @Route("/admin/products/create", name="add_product")
     * @Route("/admin/products/{id}", name="formproduct", methods="GET|POST")
     */
    public function CreateAndUpdate(Product $product = null, Request $request, EntityManagerInterface $em)
    {
        if(!$product){
            $product = new Product();
        }

        $formProduct = $this->createForm(ProductType::class, $product);
        $formProduct->handleRequest($request);
        if($formProduct->isSubmitted() && $formProduct->isValid()){
            $update = $product->getId() !== null;
            $em->persist($product);
            $em->flush();
            $this->addFlash("success", ($update) ? "La modification a été effectué" : "L'ajout a été effectué");
            return $this->redirectToRoute("admin_products");
        }

        return $this->render('admin_products/formproducts.html.twig',[
            "product" => $product,
            "form" => $formProduct->createView(),
            "isUpdating" => $product->getId() !== null
        ]);
    }

    /**
     * @Route("/admin/products/{id}", name="delete_product", methods="delete")
     */
    public function deleteProduct(Product $product, Request $request, EntityManagerInterface $em){
        if($this->isCsrfTokenValid("SUP". $product->getId(),$request->get('_token'))){
            $em->remove($product);
            $em->flush();
            $this->addFlash("success","La suppression a été effectué");
            return $this->redirectToRoute("admin_products");
        }
     
    }
    

}
