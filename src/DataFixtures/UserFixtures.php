<?php

namespace App\DataFixtures;

use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $password;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher) {
        $this->$password= $userPasswordHasher;

    }
    public function load(ObjectManager $manager): void
    {
        $faker=Factory::create("fr_FR");
        $genres=["men","women"];    
        for ($i=0; $i < 20; $i++){ 
            $sexe=mt_rand(0,1);
            if ($sexe==0){
                $type ="men";
            }else {
                $type="women" ;  
            }  
           
            $contact= new User();
            $contact    ->setNom($faker->lastname())
                        ->setPrenom($faker->firstname())
                        ->setEmail($faker->email())
                        ->setSexe($sexe)
                        ->setAvatar('https://randomuser.me/api/portraits/'.$faker->randomElement($genres)."/".mt_rand(1,99).".jpg")     
                        ->setPassword( $this->password->hashedPassword( 
                            $user,
                            "test3421"  
                        ))
                        ;
            $manager->persist($user);

        }



        $manager->flush();
    }
}
