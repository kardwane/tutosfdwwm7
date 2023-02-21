<?php

namespace App\DataFixtures;


use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //création d'une instance de faker
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            //je créer un article vide
            $article = new Article();

            //je personnalise l'article
            $article->setTitre($faker->words(4, true))
                ->setContenu($faker->paragraphs(3, true));

            //une fois que mon article est defini, je peux demander à l'enregistrer en bdd
            $manager->persist($article);

            // j'execute la requete
            $manager->flush();
        }
    }
}
