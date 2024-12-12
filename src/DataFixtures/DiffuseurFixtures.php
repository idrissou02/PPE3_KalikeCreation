<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\DiffuseurVoiture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class DiffuseurFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ['groupDiffuseur'];
    }

    public function load(ObjectManager $manager): void
    {
        

        $this->loadDiffuseurVoiture($manager);

    }

    private function loadDiffuseurVoiture(ObjectManager $manager): void
    {
        $LesDiffuseursVoiture = $this->chargefichier("DiffuseurVoiture.csv");

        foreach ($LesDiffuseursVoiture as $value)
        {
            $DiffuseurVoiture=new DiffuseurVoiture();
            $DiffuseurVoiture    
                        ->setNom($value[1])
                        ->setMateriaux($value[2])
                        ->setPrix($value[3])
                        ->setCouleur($value[4])     
                        ->setPoids($value[5])
                        ->setDuréeDeVie($value[6])
                        ->setTaille($value[7])
                        ->setDescription($value[8])
                        ->setImage('https://lorempicture.point-sys.com/400/300/'.mt_rand(1,30));
                        $manager->persist($DiffuseurVoiture);
        }
            $manager->flush();
    }

    public function chargefichier($fichier)
    {
        $fichierCsv = fopen(__DIR__ . "/" . $fichier, "r");
        $data = [];
        
        while (($row = fgetcsv($fichierCsv)) !== false) {
            $data[] = $row;
        }
        
        fclose($fichierCsv);
        return $data;
    }
}
