<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Bougie;
use App\Entity\Poudre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        $lesBougies=$this->chargefichier("Bougie.csv");
        foreach ($lesBougies as $value)
        {
            $bougie=new Bougie();
            $bougie    
                        ->setNomB($value[1])
                        ->setMateriaux($value[2])
                        ->setPrix($value[3])
                        ->setCouleur($value[4])     
                        ->setPoid($value[5])
                        ->setDdv($value[6])
                        ->setTaille($value[7]);
            $manager->persist($bougie);
        }
        $manager->flush(); 

        $lesPoudres=$this->chargefichier("Poudre.csv");
        foreach ($lesPoudres as $value)
        {
            $poudre=new Poudre();
            $poudre    
                        ->setNom($value[1])
                        ->setMateriaux($value[2])
                        ->setPrix($value[3])
                        ->setCouleur($value[4])     
                        ->setPoids($value[5])
                        ->setDuréeDeVie($value[6])
                        ->setImage($value[7]);
            $manager->persist($bougie);
        }
        $manager->flush(); 
    }

    

    public function chargefichier($fichier)
    {
        $fichierCsv=fopen(__DIR__."/" . $fichier ,"r"); 
        while (!feof($fichierCsv))   
        {
            $data[]=fgetcsv($fichierCsv);
        }
        fclose($fichierCsv);
        return $data;
    }
}
