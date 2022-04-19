<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="leClient")
     */
    private $lesReservations;

    public function __construct()
    {
        $this->lesReservations = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getLesReservations(): Collection
    {
        return $this->lesReservations;
    }

    public function addLesReservation(Reservation $lesReservation): self
    {
        if (!$this->lesReservations->contains($lesReservation)) {
            $this->lesReservations[] = $lesReservation;
            $lesReservation->setLeClient($this);
        }

        return $this;
    }

    public function removeLesReservation(Reservation $lesReservation): self
    {
        if ($this->lesReservations->removeElement($lesReservation)) {
            // set the owning side to null (unless already changed)
            if ($lesReservation->getLeClient() === $this) {
                $lesReservation->setLeClient(null);
            }
        }

        return $this;
    }
}
