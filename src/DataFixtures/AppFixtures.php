<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Bougie;
use App\Entity\Poudre;
use App\Entity\ObjetDecoration;
use App\Entity\DiffuseurVoiture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $this->loadBougies($manager);

        $this->loadPoudre($manager);

        $this->loadObjetsDecoration($manager);

    }

    private function loadBougies(ObjectManager $manager): void
    {
        $lesBougies = $this->chargefichier("Bougie.csv");

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
                        ->setTaille($value[7])
                        ->setImage('https://lorempicture.point-sys.com/400/300/'.mt_rand(1,30));
                        $manager->persist($bougie);
        }
            $manager->flush();
    }

    private function loadObjetsDecoration(ObjectManager $manager): void
    {
        $lesObjetsDeco = $this->chargefichier("ObjetsDecoration.csv");

        foreach ($lesObjetsDeco as $value) {
            $objetDeco = new ObjetDecoration();
            $objetDeco
                ->setNom($value[1])
                ->setDescription($value[2])
                ->setPrix($value[3])
                ->setImage('https://lorempicture.point-sys.com/400/300/'.mt_rand(1,30));
            $manager->persist($objetDeco);
        }
        $manager->flush();
    }

    private function loadPoudre(ObjectManager $manager): void
    {
        $lesPoudres = $this->chargefichier("Poudre.csv");

        foreach ($lesPoudres as $value)
        {
            $poudre=new Poudre();
            $poudre    
                        ->setNom($value[1])
                        ->setMateriaux($value[2])
                        ->setPrix(3.3)
                        ->setCouleur($value[4])     
                        ->setPoids(5)
                        ->setDureeDeVie($value[6])
                        ->setTaille($value[7.7])
                        ->setDescription($value[8])
                        ->setImage('https://lorempicture.point-sys.com/400/300/'.mt_rand(1,30));
                        $manager->persist($poudre);
        }
            $manager->flush();
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
