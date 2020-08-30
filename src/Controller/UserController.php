<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
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
        return $this->render('user/register.html.twig',[
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="login")
     */
    public function login(AuthenticationUtils $util){
        return $this->render('user/login.html.twig',[
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
