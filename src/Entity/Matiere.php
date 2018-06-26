<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Matiere
 *
 * @ORM\Table(name="matiere")
 * @ORM\Entity
 */
class Matiere
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMatiere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmatiere;

    /**
     * @var int
     *
     * @ORM\Column(name="nomMatiere", type="integer", nullable=false)
     */
    private $nommatiere;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Classe", mappedBy="idmatiere")
     */
    private $idclasse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idclasse = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdmatiere(): ?int
    {
        return $this->idmatiere;
    }

    public function getNommatiere(): ?int
    {
        return $this->nommatiere;
    }

    public function setNommatiere(int $nommatiere): self
    {
        $this->nommatiere = $nommatiere;

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
            $idclasse->addIdmatiere($this);
        }

        return $this;
    }

    public function removeIdclasse(Classe $idclasse): self
    {
        if ($this->idclasse->contains($idclasse)) {
            $this->idclasse->removeElement($idclasse);
            $idclasse->removeIdmatiere($this);
        }

        return $this;
    }

}
