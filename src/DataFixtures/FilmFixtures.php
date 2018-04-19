<?php
namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

use App\DataFixtures\RealisateurFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FilmFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        
        $faker = Faker\Factory::create('fr_FR');
        
        for ($i = 1; $i <= 50; $i++) {
            $film = new Film();
            $film->setTitre($faker->sentence(rand(3, 8)));
            
            if(rand(1,4)==2){
                $film->setTitrevo($faker->sentence(rand(3, 8)));
            }
            
            if(rand(1,3)==2){
                $film->setAnnee(rand(1900,2018));
            }
            
            if(rand(1,4)==2){
                $film->setDuree('01h30');
            }
            
            $id_real = rand(1,40);
            $film->addRealisateur($this->getReference(RealisateurFixtures::REALISATEUR_REFERENCE.$id_real));
            if(rand(1,10)>9){
                $id_real2 = rand(1,40);
                $film->addRealisateur($this->getReference(RealisateurFixtures::REALISATEUR_REFERENCE.$id_real2));
            }
            
            $film->setDescription($faker->paragraphs(rand(1, 5), true));
            $manager->persist($film);
        }
        $manager->flush();
    }
    
    public function getDependencies()
    {
        return array(
            RealisateurFixtures::class,
        );
    }
    
}
