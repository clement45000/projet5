<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use App\Form\ContactType;
use App\Form\RegisterType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
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
     * @Route("/nous_situer", name="nous_situer")
     */
    public function localisation()
    {
        return $this->render('global/localisation.html.twig', [
      
        ]);
    }

     /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request,MailerInterface $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $contact = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
                ->from($contact->get('mail')->getData()) //expéditeur
                ->to('symfony@webproject.ovh')
                ->subject($contact->get('subject')->getData())
                ->htmlTemplate('emails/contactmail.html.twig')
                ->context([
                    'mail' => $contact->get('mail')->getData(),
                    'message' => $contact->get('message')->getData(),
                    'name' => $contact->get('name')->getData(),
                    'surname' => $contact->get('surname')->getData(),
                    'subject' => $contact->get('subject')->getData()
                ]);
                $mailer->send($email);
                $this->addFlash('message', 'Votre messsage nous a bien été envoyé');
                return $this->redirectToRoute('contact');
        }
        return $this->render('global/contact.html.twig',[
            "form" => $form->createView()
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

    

    

    



}
