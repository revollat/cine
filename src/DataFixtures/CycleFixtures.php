<?php
namespace App\DataFixtures;

use App\Entity\Cycle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CycleFixtures extends Fixture
{
    
    public const CYCLE_REFERENCE = 'cycle';
    
    public function load(ObjectManager $manager)
    {
        
        $cycle1 = new Cycle();
        $cycle1->setNom('Cycle 1');
        $manager->persist($cycle1);
        $this->addReference(self::CYCLE_REFERENCE.'1', $cycle1);
        
        $cycle2 = new Cycle();
        $cycle2->setNom('Cycle 2');
        $manager->persist($cycle2);
        $this->addReference(self::CYCLE_REFERENCE.'2', $cycle2);
        
        $cycle3 = new Cycle();
        $cycle3->setNom('Cycle 3');
        $manager->persist($cycle3);
        $this->addReference(self::CYCLE_REFERENCE.'3', $cycle3);
        
        $manager->flush();
    }
}
