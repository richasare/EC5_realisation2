<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BateauRepository::class)
 */
class Bateau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $longueur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $largeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vitesse;

    /**
     * @ORM\OneToMany(targetEntity=Traversee::class, mappedBy="leBateau")
     */
    private $traversees;

    /**
     * @ORM\OneToMany(targetEntity=Contenir::class, mappedBy="bateau")
     */
    private $contenirs;

    /**
     * @ORM\OneToMany(targetEntity=Proposer::class, mappedBy="bateau")
     */
    private $proposers;

    public function __construct()
    {
        $this->traversees = new ArrayCollection();
        $this->contenirs = new ArrayCollection();
        $this->proposers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLongueur(): ?string
    {
        return $this->longueur;
    }

    public function setLongueur(string $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?string
    {
        return $this->largeur;
    }

    public function setLargeur(string $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getVitesse(): ?string
    {
        return $this->vitesse;
    }

    public function setVitesse(string $vitesse): self
    {
        $this->vitesse = $vitesse;

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
            $traversee->setLeBateau($this);
        }

        return $this;
    }

    public function removeTraversee(Traversee $traversee): self
    {
        if ($this->traversees->removeElement($traversee)) {
            // set the owning side to null (unless already changed)
            if ($traversee->getLeBateau() === $this) {
                $traversee->setLeBateau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Contenir[]
     */
    public function getContenirs(): Collection
    {
        return $this->contenirs;
    }

    public function addContenir(Contenir $contenir): self
    {
        if (!$this->contenirs->contains($contenir)) {
            $this->contenirs[] = $contenir;
            $contenir->setBateau($this);
        }

        return $this;
    }

    public function removeContenir(Contenir $contenir): self
    {
        if ($this->contenirs->removeElement($contenir)) {
            // set the owning side to null (unless already changed)
            if ($contenir->getBateau() === $this) {
                $contenir->setBateau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Proposer[]
     */
    public function getProposers(): Collection
    {
        return $this->proposers;
    }

    public function addProposer(Proposer $proposer): self
    {
        if (!$this->proposers->contains($proposer)) {
            $this->proposers[] = $proposer;
            $proposer->setBateau($this);
        }

        return $this;
    }

    public function removeProposer(Proposer $proposer): self
    {
        if ($this->proposers->removeElement($proposer)) {
            // set the owning side to null (unless already changed)
            if ($proposer->getBateau() === $this) {
                $proposer->setBateau(null);
            }
        }

        return $this;
    }
}
