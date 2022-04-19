<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="types")
     */
    private $laCategorie;

    /**
     * @ORM\OneToMany(targetEntity=Participer::class, mappedBy="leType")
     */
    private $participers;

    /**
     * @ORM\OneToMany(targetEntity=Tarifer::class, mappedBy="leType")
     */
    private $tarifers;

    public function __construct()
    {
        $this->participers = new ArrayCollection();
        $this->tarifers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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

    /**
     * @return Collection|Participer[]
     */
    public function getParticipers(): Collection
    {
        return $this->participers;
    }

    public function addParticiper(Participer $participer): self
    {
        if (!$this->participers->contains($participer)) {
            $this->participers[] = $participer;
            $participer->setLeType($this);
        }

        return $this;
    }

    public function removeParticiper(Participer $participer): self
    {
        if ($this->participers->removeElement($participer)) {
            // set the owning side to null (unless already changed)
            if ($participer->getLeType() === $this) {
                $participer->setLeType(null);
            }
        }

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
            $tarifer->setLeType($this);
        }

        return $this;
    }

    public function removeTarifer(Tarifer $tarifer): self
    {
        if ($this->tarifers->removeElement($tarifer)) {
            // set the owning side to null (unless already changed)
            if ($tarifer->getLeType() === $this) {
                $tarifer->setLeType(null);
            }
        }

        return $this;
    }
}
