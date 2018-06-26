<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ecole
 *
 * @ORM\Table(name="ecole")
 * @ORM\Entity
 */
class Ecole
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEcole", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idecole;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEcole", type="string", length=50, nullable=false)
     */
    private $nomecole;

    /**
     * @var string|null
     *
     * @ORM\Column(name="statut", type="string", length=20, nullable=true)
     */
    private $statut;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cursus", mappedBy="idecole")
     */
    private $idcursus;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Semestre", mappedBy="idecole")
     */
    private $idsemestre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcursus = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idsemestre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdecole(): ?int
    {
        return $this->idecole;
    }

    public function getNomecole(): ?string
    {
        return $this->nomecole;
    }

    public function setNomecole(string $nomecole): self
    {
        $this->nomecole = $nomecole;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|Cursus[]
     */
    public function getIdcursus(): Collection
    {
        return $this->idcursus;
    }

    /**
     * @param int $idecole
     */
    public function setIdecole(int $idecole)
    {
        $this->idecole = $idecole;
    }

    /**
     * @param Collection $idcursus
     */
    public function setIdcursus(Collection $idcursus)
    {
        $this->idcursus = $idcursus;
    }

    /**
     * @param Collection $idsemestre
     */
    public function setIdsemestre(Collection $idsemestre)
    {
        $this->idsemestre = $idsemestre;
    }

    public function addIdcursus(Cursus $idcursus): self
    {
        if (!$this->idcursus->contains($idcursus)) {
            $this->idcursus[] = $idcursus;
            $idcursus->addIdecole($this);
        }

        return $this;
    }

    public function removeIdcursus(Cursus $idcursus): self
    {
        if ($this->idcursus->contains($idcursus)) {
            $this->idcursus->removeElement($idcursus);
            $idcursus->removeIdecole($this);
        }

        return $this;
    }

    /**
     * @return Collection|Semestre[]
     */
    public function getIdsemestre(): Collection
    {
        return $this->idsemestre;
    }

    public function addIdsemestre(Semestre $idsemestre): self
    {
        if (!$this->idsemestre->contains($idsemestre)) {
            $this->idsemestre[] = $idsemestre;
        }

        return $this;
    }

    public function removeIdsemestre(Semestre $idsemestre): self
    {
        if ($this->idsemestre->contains($idsemestre)) {
            $this->idsemestre->removeElement($idsemestre);
        }

        return $this;
    }
    public function __toString() {
        return $this->nomecole;
    }

}
