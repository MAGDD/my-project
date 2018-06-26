<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation", indexes={@ORM\Index(name="evaluation_matiere", columns={"idMatiere"}), @ORM\Index(name="evaluation_semestre", columns={"idSemestre"})})
 * @ORM\Entity
 */
class Evaluation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEvaluation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevaluation;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEvaluation", type="string", length=50, nullable=false)
     */
    private $nomevaluation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEvaluation", type="date", nullable=false)
     */
    private $dateevaluation;

    /**
     * @var string
     *
     * @ORM\Column(name="heureEvaluation", type="string", length=20, nullable=false)
     */
    private $heureevaluation;

    /**
     * @var \Matiere
     *
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMatiere", referencedColumnName="idMatiere")
     * })
     */
    private $idmatiere;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Classe", mappedBy="idevaluation")
     */
    private $idclasse;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Users", mappedBy="idevaluation")
     */
    private $ideleve;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idclasse = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ideleve = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdevaluation(): ?int
    {
        return $this->idevaluation;
    }

    public function getNomevaluation(): ?string
    {
        return $this->nomevaluation;
    }

    public function setNomevaluation(string $nomevaluation): self
    {
        $this->nomevaluation = $nomevaluation;

        return $this;
    }

    public function getDateevaluation(): ?\DateTimeInterface
    {
        return $this->dateevaluation;
    }

    public function setDateevaluation(\DateTimeInterface $dateevaluation): self
    {
        $this->dateevaluation = $dateevaluation;

        return $this;
    }

    public function getHeureevaluation(): ?string
    {
        return $this->heureevaluation;
    }

    public function setHeureevaluation(string $heureevaluation): self
    {
        $this->heureevaluation = $heureevaluation;

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

    public function getIdsemestre(): ?Semestre
    {
        return $this->idsemestre;
    }

    public function setIdsemestre(?Semestre $idsemestre): self
    {
        $this->idsemestre = $idsemestre;

        return $this;
    }

    /**
     * @return Collection|Classe[]
     */
    public function getIdclasse(): Collection
    {
        return $this->idclasse;
    }

    public function addIdclasse(Classe $idclasse): self
    {
        if (!$this->idclasse->contains($idclasse)) {
            $this->idclasse[] = $idclasse;
            $idclasse->addIdevaluation($this);
        }

        return $this;
    }

    public function removeIdclasse(Classe $idclasse): self
    {
        if ($this->idclasse->contains($idclasse)) {
            $this->idclasse->removeElement($idclasse);
            $idclasse->removeIdevaluation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getIdeleve(): Collection
    {
        return $this->ideleve;
    }

    public function addIdeleve(Users $ideleve): self
    {
        if (!$this->ideleve->contains($ideleve)) {
            $this->ideleve[] = $ideleve;
            $ideleve->addIdevaluation($this);
        }

        return $this;
    }

    public function removeIdeleve(Users $ideleve): self
    {
        if ($this->ideleve->contains($ideleve)) {
            $this->ideleve->removeElement($ideleve);
            $ideleve->removeIdevaluation($this);
        }

        return $this;
    }

}
