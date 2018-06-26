<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absence
 *
 * @ORM\Table(name="absence", indexes={@ORM\Index(name="idEleve", columns={"idEleve"}), @ORM\Index(name="idMatiere", columns={"idMatiere"}), @ORM\Index(name="FK_765AE0C922CBA5E7", columns={"idSemestre"})})
 * @ORM\Entity
 */
class Absence
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAbsence", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idabsence;

    /**
     * @var int
     *
     * @ORM\Column(name="raisonAbsence", type="integer", nullable=false)
     */
    private $raisonabsence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAbsence", type="date", nullable=false)
     */
    private $dateabsence;

    /**
     * @var \Semestre
     *
     * @ORM\ManyToOne(targetEntity="Semestre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSemestre", referencedColumnName="IdSemestre")
     * })
     */
    private $idsemestre;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEleve", referencedColumnName="identifiant")
     * })
     */
    private $ideleve;

    /**
     * @var \Matiere
     *
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMatiere", referencedColumnName="idMatiere")
     * })
     */
    private $idmatiere;

    public function getIdabsence(): ?int
    {
        return $this->idabsence;
    }

    public function getRaisonabsence(): ?int
    {
        return $this->raisonabsence;
    }

    public function setRaisonabsence(int $raisonabsence): self
    {
        $this->raisonabsence = $raisonabsence;

        return $this;
    }

    public function getDateabsence(): ?\DateTimeInterface
    {
        return $this->dateabsence;
    }

    public function setDateabsence(\DateTimeInterface $dateabsence): self
    {
        $this->dateabsence = $dateabsence;

        return $this;
    }

    public function getIdsemestre(): ?Semestre
    {
        return $this->idsemestre;
    }

    public function setIdsemestre(?Semestre $idsemestre): self
    {
        $this->idsemestre = $idsemestre;

        return $this;
    }

    public function getIdeleve(): ?Users
    {
        return $this->ideleve;
    }

    public function setIdeleve(?Users $ideleve): self
    {
        $this->ideleve = $ideleve;

        return $this;
    }

    public function getIdmatiere(): ?Matiere
    {
        return $this->idmatiere;
    }

    public function setIdmatiere(?Matiere $idmatiere): self
    {
        $this->idmatiere = $idmatiere;

        return $this;
    }


}
