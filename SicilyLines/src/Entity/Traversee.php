<?php

namespace App\Entity;

use App\Repository\TraverseeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TraverseeRepository::class)
 */
class Traversee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $heure;

    /**
     * @ORM\ManyToOne(targetEntity=Bateau::class, inversedBy="traversees")
     */
    private $leBateau;

    /**
     * @ORM\ManyToOne(targetEntity=Liaison::class, inversedBy="traversees")
     */
    private $laLiaison;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getLeBateau(): ?bateau
    {
        return $this->leBateau;
    }

    public function setLeBateau(?bateau $leBateau): self
    {
        $this->leBateau = $leBateau;

        return $this;
    }

    public function getLaLiaison(): ?Liaison
    {
        return $this->laLiaison;
    }

    public function setLaLiaison(?Liaison $laLiaison): self
    {
        $this->laLiaison = $laLiaison;

        return $this;
    }
}
