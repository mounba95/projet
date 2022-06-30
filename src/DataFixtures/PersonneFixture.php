<?php

namespace App\DataFixtures;

use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;
use Doctrine\Persistence\ObjectManager;

class PersonneFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR') ;
        for($i=0; $i < 100; $i++){

        $personne = new Personne();

        $personne -> setFirstName($faker->firstname);
        $personne -> setName($faker->name);
        $personne -> setAge($faker->numberBetween(18,50));


        $manager->persist($personne);
        }

        $manager->flush();

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
