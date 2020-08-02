<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Post;
use App\Entity\Comment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PostFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        // php bin/console doctrine:fixtures:load
        $faker = \Faker\Factory::create('fr_FR');

        //Créer 10 articles 
        for($p = 1; $p <=10; $p++){
            $post = new Post();

            $content = '<p>' . join($faker->paragraphs(4), '</p><p>').'</p>';

            $post->setTitle($faker->sentence())
                 ->setContent($content)
                 ->setImage($faker->imageUrl)
                 ->setCreateAt($faker->dateTimeBetween('-5 months'));

            $manager->persist($post);

            //On donnes des commentaires à l'article
            for($c = 1; $c <= mt_rand(2, 4); $c++){
                $comment = new Comment();

                $days =(new \DateTime())->diff($post->getCreateAt())->days;

                $comment->setAuthor($faker->name)
                        ->setContent($content)
                        ->setCreatedAt($faker->dateTimeBetween('-' . $days . 'days'))
                        ->setPost($post);

                $manager->persist($comment);
            }
        }
        
        $manager->flush();
    }//fin de la methode (public function load)
}//fin de la classe
