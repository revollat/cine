<?php
namespace App\DataFixtures;

use App\Entity\Realisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class RealisateurFixtures extends Fixture
{
    
    public const REALISATEUR_REFERENCE = 'realisateur';
    
    public function load(ObjectManager $manager)
    {
        
        $faker = Faker\Factory::create('fr_FR');
        
        for ($i = 1; $i <= 40; $i++) {
            $realisateur = new Realisateur();
            $realisateur->setNom($faker->name());
            $manager->persist($realisateur);
            $this->addReference(self::REALISATEUR_REFERENCE.$i, $realisateur);
        }
        
        $manager->flush();
    }
}
