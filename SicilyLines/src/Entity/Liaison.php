<?php

namespace App\Entity;

use App\Repository\LiaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LiaisonRepository::class)
 */
class Liaison
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity=Port::class, inversedBy="liaisons")
     */
    private $portDepart;

    /**
     * @ORM\ManyToOne(targetEntity=Port::class, inversedBy="liaisons")
     */
    private $portArrivee;

    /**
     * @ORM\OneToMany(targetEntity=Traversee::class, mappedBy="laLiaison")
     */
    private $traversees;

    /**
     * @ORM\ManyToOne(targetEntity=Secteur::class, inversedBy="liaisons")
     */
    private $leSecteur;

    /**
     * @ORM\OneToMany(targetEntity=Tarifer::class, mappedBy="laLiaison")
     */
    private $tarifers;

    public function __construct()
    {
        $this->traversees = new ArrayCollection();
        $this->tarifers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getPortDepart(): ?port
    {
        return $this->portDepart;
    }

    public function setPortDepart(?port $portDepart): self
    {
        $this->portDepart = $portDepart;

        return $this;
    }

    public function getPortArrivee(): ?port
    {
        return $this->portArrivee;
    }

    public function setPortArrivee(?port $portArrivee): self
    {
        $this->portArrivee = $portArrivee;

        return $this;
    }

    /**
     * @return Collection|Traversee[]
     */
    public function getTraversees(): Collection
    {
        return $this->traversees;
    }

    public function addTraversee(Traversee $traversee): self
    {
        if (!$this->traversees->contains($traversee)) {
            $this->traversees[] = $traversee;
            $traversee->setLaLiaison($this);
        }

        return $this;
    }

    public function removeTraversee(Traversee $traversee): self
    {
        if ($this->traversees->removeElement($traversee)) {
            // set the owning side to null (unless already changed)
            if ($traversee->getLaLiaison() === $this) {
                $traversee->setLaLiaison(null);
            }
        }

        return $this;
    }

    public function getLeSecteur(): ?Secteur
    {
        return $this->leSecteur;
    }

    public function setLeSecteur(?Secteur $leSecteur): self
    {
        $this->leSecteur = $leSecteur;

        return $this;
    }

    /**
     * @return Collection|Tarifer[]
     */
    public function getTarifers(): Collection
    {
        return $this->tarifers;
    }

    public function addTarifer(Tarifer $tarifer): self
    {
        if (!$this->tarifers->contains($tarifer)) {
            $this->tarifers[] = $tarifer;
            $tarifer->setLaLiaison($this);
        }

        return $this;
    }

    public function removeTarifer(Tarifer $tarifer): self
    {
        if ($this->tarifers->removeElement($tarifer)) {
            // set the owning side to null (unless already changed)
            if ($tarifer->getLaLiaison() === $this) {
                $tarifer->setLaLiaison(null);
            }
        }

        return $this;
    }
}
