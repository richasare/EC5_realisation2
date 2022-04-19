<?php

namespace App\Entity;

use App\Repository\TariferRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TariferRepository::class)
 */
class Tarifer
{
   

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $tarif;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Liaison::class, inversedBy="tarifers")
     */
    private $laLiaison;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Periode::class, inversedBy="tarifers")
     */
    private $laPeriode;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="tarifers")
     */
    private $leType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarif(): ?string
    {
        return $this->tarif;
    }

    public function setTarif(string $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getLaLiaison(): ?liaison
    {
        return $this->laLiaison;
    }

    public function setLaLiaison(?liaison $laLiaison): self
    {
        $this->laLiaison = $laLiaison;

        return $this;
    }

    public function getLaPeriode(): ?periode
    {
        return $this->laPeriode;
    }

    public function setLaPeriode(?periode $laPeriode): self
    {
        $this->laPeriode = $laPeriode;

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

   
}
