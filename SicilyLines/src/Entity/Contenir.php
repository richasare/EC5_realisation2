<?php

namespace App\Entity;

use App\Repository\ContenirRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContenirRepository::class)
 */
class Contenir
{
    /**
     * @ORM\Column(type="integer")
     */
    private $nbMax;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="contenirs")
     */
    private $laCategorie;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=bateau::class, inversedBy="contenirs")
     */
    private $bateau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbMax(): ?int
    {
        return $this->nbMax;
    }

    public function setNbMax(int $nbMax): self
    {
        $this->nbMax = $nbMax;

        return $this;
    }

    public function getLaCategorie(): ?Categorie
    {
        return $this->laCategorie;
    }

    public function setLaCategorie(?Categorie $laCategorie): self
    {
        $this->laCategorie = $laCategorie;

        return $this;
    }

    public function getBateau(): ?bateau
    {
        return $this->bateau;
    }

    public function setBateau(?bateau $bateau): self
    {
        $this->bateau = $bateau;

        return $this;
    }
}
