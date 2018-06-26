<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emploidutemps
 *
 * @ORM\Table(name="emploidutemps", indexes={@ORM\Index(name="emploidutemps_semestre", columns={"idSemestre"}), @ORM\Index(name="emploidutemps_classe", columns={"idClasse"})})
 * @ORM\Entity
 */
class Emploidutemps
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEmploidutemps", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idemploidutemps;

    /**
     * @var int
     *
     * @ORM\Column(name="nomFichier", type="integer", nullable=false)
     */
    private $nomfichier;

    /**
     * @var \Classe
     *
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClasse", referencedColumnName="idClasse")
     * })
     */
    private $idclasse;

    /**
     * @var \Semestre
     *
     * @ORM\ManyToOne(targetEntity="Semestre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSemestre", referencedColumnName="IdSemestre")
     * })
     */
    private $idsemestre;

    public function getIdemploidutemps(): ?int
    {
        return $this->idemploidutemps;
    }

    public function getNomfichier(): ?int
    {
        return $this->nomfichier;
    }

    public function setNomfichier(int $nomfichier): self
    {
        $this->nomfichier = $nomfichier;

        return $this;
    }

    public function getIdclasse(): ?Classe
    {
        return $this->idclasse;
    }

    public function setIdclasse(?Classe $idclasse): self
    {
        $this->idclasse = $idclasse;

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


}
