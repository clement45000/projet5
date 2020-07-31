<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Post;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      for($i = 1; $i <=10; $i++){
          $post = new Post();
          $post->setTitle("Titre de l'article n°$i")
               ->setContent("<p>Contenu de l'article n°$i</p>")
               ->setImage("http://placehold.it/350x150")
               ->setCreateAt(new \DateTime());

            $manager->persist($post);
        }
        $manager->flush();
    }
}
