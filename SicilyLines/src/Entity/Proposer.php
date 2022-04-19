<?php

namespace App\Entity;

use App\Repository\ProposerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProposerRepository::class)
 */
class Proposer
{

    /**
     * @ORM\Column(type="integer")
     */
    private $qte;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Equipement::class, inversedBy="proposers")
     */
    private $equipement;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Bateau::class, inversedBy="proposers")
     */
    private $bateau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getEquipement(): ?equipement
    {
        return $this->equipement;
    }

    public function setEquipement(?equipement $equipement): self
    {
        $this->equipement = $equipement;

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
