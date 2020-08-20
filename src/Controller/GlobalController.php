<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use App\Form\RegisterType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class GlobalController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PostRepository $repository)
    {
        $lastposts = $repository->findBy([],['id'=>'DESC'],1);
        return $this->render('global/home.html.twig', [
            'lastposts' => $lastposts
        ]);
    }

     /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('global/contact.html.twig', [
      
        ]);
    }

      /**
     * @Route("/client/weather", name="weather")
     */
    public function getWeatherbycity()
    {
        return $this->render('global/weather.html.twig', [
      
        ]);
    }

    /**
     * @Route("/confidentialité", name="mentions_legales")
     */
    public function mentions()
    {
        return $this->render('global/mentions.html.twig', [
      
        ]);
    }

    /**
     * @Route("/inscription", name="register")
     */
    public function register(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class,$user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $passwordCrypte = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($passwordCrypte);
            $user->setRoles("ROLE_USER");
            $em->persist($user);
            $em->flush();
            $this->addFlash("success", "Votre vompte a été crée");
            return $this->redirectToRoute("register");
        }
        return $this->render('global/register.html.twig',[
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="login")
     */
    public function login(AuthenticationUtils $util){
        return $this->render('global/login.html.twig',[
            "lastUserName" => $util->getLastUsername(),
            "error" => $util->getLastAuthenticationError()
        ]);
    }

    /**
     * @Route("/deconnexion", name="logout")
     */
    public function logout(){
      
    }



}
