<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="classe", indexes={@ORM\Index(name="FK_8F87BF961EBC29B1", columns={"idEcole"})})
 * @ORM\Entity
 */
class Classe
{
    /**
     * @var int
     *
     * @ORM\Column(name="idClasse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclasse;

    /**
     * @var string
     *
     * @ORM\Column(name="nomClasse", type="string", length=50, nullable=false)
     */
    private $nomclasse;

    /**
     * @var \Ecole
     *
     * @ORM\ManyToOne(targetEntity="Ecole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEcole", referencedColumnName="idEcole")
     * })
     */
    private $idecole;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Evaluation", inversedBy="idclasse")
     * @ORM\JoinTable(name="classe_evaluation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idClasse", referencedColumnName="idClasse")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idEvaluation", referencedColumnName="idEvaluation")
     *   }
     * )
     */
    private $idevaluation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Matiere", inversedBy="idclasse")
     * @ORM\JoinTable(name="classe_matiere",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idClasse", referencedColumnName="idClasse")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idMatiere", referencedColumnName="idMatiere")
     *   }
     * )
     */
    private $idmatiere;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idevaluation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idmatiere = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdclasse(): ?int
    {
        return $this->idclasse;
    }

    public function getNomclasse(): ?string
    {
        return $this->nomclasse;
    }

    public function setNomclasse(string $nomclasse): self
    {
        $this->nomclasse = $nomclasse;

        return $this;
    }

    public function getIdecole(): ?Ecole
    {
        return $this->idecole;
    }

    public function setIdecole(?Ecole $idecole): self
    {
        $this->idecole = $idecole;

        return $this;
    }

    /**
     * @return Collection|Evaluation[]
     */
    public function getIdevaluation(): Collection
    {
        return $this->idevaluation;
    }

    public function addIdevaluation(Evaluation $idevaluation): self
    {
        if (!$this->idevaluation->contains($idevaluation)) {
            $this->idevaluation[] = $idevaluation;
        }

        return $this;
    }

    public function removeIdevaluation(Evaluation $idevaluation): self
    {
        if ($this->idevaluation->contains($idevaluation)) {
            $this->idevaluation->removeElement($idevaluation);
        }

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getIdmatiere(): Collection
    {
        return $this->idmatiere;
    }

    public function addIdmatiere(Matiere $idmatiere): self
    {
        if (!$this->idmatiere->contains($idmatiere)) {
            $this->idmatiere[] = $idmatiere;
        }

        return $this;
    }

    public function removeIdmatiere(Matiere $idmatiere): self
    {
        if ($this->idmatiere->contains($idmatiere)) {
            $this->idmatiere->removeElement($idmatiere);
        }

        return $this;
    }

}
