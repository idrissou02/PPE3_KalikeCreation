<?php

namespace App\Entity;

use App\Repository\BougieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BougieRepository::class)]
class Bougie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $materiaux = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $couleur = null;

    #[ORM\Column(length: 255)]
    private ?string $poid = null;

    #[ORM\Column(length: 255)]
    private ?string $Ddv = null;

    #[ORM\Column(length: 255)]
    private ?string $taille = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageFileName = null;

    public function __construct()
    {
        $this->updatedAt = new \DateTimeImmutable();
        $this->setImage("7da2fbda8626e815d79c37dbec8697f4.jpg");
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function nom(): ?string
    {
        return $this->nom;
    }

    public function setnom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMateriaux(): ?string
    {
        return $this->materiaux;
    }

    public function setMateriaux(string $materiaux): static
    {
        $this->materiaux = $materiaux;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getPoid(): ?string
    {
        return $this->poid;
    }

    public function setPoid(string $poid): static
    {
        $this->poid = $poid;

        return $this;
    }

    public function getDdv(): ?string
    {
        return $this->Ddv;
    }

    public function setDdv(string $Ddv): static
    {
        $this->Ddv = $Ddv;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getImageFileName(): ?string
    {
        return $this->imageFileName;
    }

    public function setImageFileName(?string $imageFileName): static
    {
        $this->imageFileName = $imageFileName;

        return $this;
    }
}
