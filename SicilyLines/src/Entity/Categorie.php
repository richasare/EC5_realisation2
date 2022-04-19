<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
     * @ORM\OneToMany(targetEntity=Type::class, mappedBy="laCategorie")
     */
    private $types;

    /**
     * @ORM\OneToMany(targetEntity=Contenir::class, mappedBy="laCategorie")
     */
    private $contenirs;

    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->contenirs = new ArrayCollection();
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

    /**
     * @return Collection|Type[]
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
            $type->setLaCategorie($this);
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        if ($this->types->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getLaCategorie() === $this) {
                $type->setLaCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|contenir[]
     */
    public function getContenirs(): Collection
    {
        return $this->contenirs;
    }

    public function addContenir(contenir $contenir): self
    {
        if (!$this->contenirs->contains($contenir)) {
            $this->contenirs[] = $contenir;
            $contenir->setLaCategorie($this);
        }

        return $this;
    }

    public function removeContenir(contenir $contenir): self
    {
        if ($this->contenirs->removeElement($contenir)) {
            // set the owning side to null (unless already changed)
            if ($contenir->getLaCategorie() === $this) {
                $contenir->setLaCategorie(null);
            }
        }

        return $this;
    }
}
