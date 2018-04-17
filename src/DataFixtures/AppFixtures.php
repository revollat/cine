<?php
namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $faker = Faker\Factory::create('fr_FR');
        
        for ($i = 0; $i < 20; $i++) {
            $product = new Film();
            $product->setTitre($faker->sentence(6));
            
            $manager->persist($product);
        }
        $manager->flush();
    }
}
