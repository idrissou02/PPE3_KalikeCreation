<?php 

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\PoudreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

class FiltreBougie {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Assert\Length(
        min: 2,
        minMessage: 'The name need to be longer than {{ limit }} characters'
    )]
    public string $nom;

    }