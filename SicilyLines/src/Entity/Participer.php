<?php

namespace App\Entity;

use App\Repository\ParticiperRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticiperRepository::class)
 */
class Participer
{

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="participers")
     */
    private $leType;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Reservation::class, inversedBy="participers")
     */
    private $laReservation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?int
    {
        return $this->nombre;
    }

    public function setNombre(int $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getLeType(): ?type
    {
        return $this->leType;
    }

    public function setLeType(?type $leType): self
    {
        $this->leType = $leType;

        return $this;
    }

    public function getLaReservation(): ?reservation
    {
        return $this->laReservation;
    }

    public function setLaReservation(?reservation $laReservation): self
    {
        $this->laReservation = $laReservation;

        return $this;
    }
}
