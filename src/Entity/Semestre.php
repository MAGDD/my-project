<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Semestre
 *
 * @ORM\Table(name="semestre")
 * @ORM\Entity
 */
class Semestre
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdSemestre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsemestre;

    /**
     * @var string
     *
     * @ORM\Column(name="nomSemestre", type="string", length=20, nullable=false)
     */
    private $nomsemestre;

    /**
     * @var \Ecole
     *
     * @ORM\ManyToMany(targetEntity="Ecole", inversedBy="idsemestre")
     *    @ORM\JoinTable(name="ecole_semestre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idSemestre", referencedColumnName="idSemestre")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idEcole", referencedColumnName="idEcole")
     *   }
     * )
     */
    private $idecole;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idecole = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdsemestre(): ?int
    {
        return $this->idsemestre;
    }

    public function getNomsemestre(): ?string
    {
        return $this->nomsemestre;
    }

    public function setNomsemestre(string $nomsemestre): self
    {
        $this->nomsemestre = $nomsemestre;

        return $this;
    }

    /**
     * @return Collection|Ecole[]
     */
    public function getIdecole(): Collection
    {
        return $this->idecole;
    }

    public function addIdecole(Ecole $idecole): self
    {
        if (!$this->idecole->contains($idecole)) {
            $this->idecole[] = $idecole;
            $idecole->addIdsemestre($this);
        }

        return $this;
    }

    public function removeIdecole(Ecole $idecole): self
    {
        if ($this->idecole->contains($idecole)) {
            $this->idecole->removeElement($idecole);
            $idecole->removeIdsemestre($this);
        }

        return $this;
    }

    /**
     * @param int $idsemestre
     */
    public function setIdsemestre(int $idsemestre)
    {
        $this->idsemestre = $idsemestre;
    }

    /**
     * @param Collection $idecole
     */
    public function setIdecole(Collection $idecole)
    {
        $this->idecole = $idecole;
    }

}
