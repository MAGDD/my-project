<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cursus
 *
 * @ORM\Table(name="cursus", indexes={@ORM\Index(name="idCursus", columns={"idCursus"})})
 * @ORM\Entity
 */
class Cursus
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCursus", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcursus;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCursus", type="string", length=20, nullable=false)
     */
    private $nomcursus;

    /**
     * @var \Ecole
     *
     * @ORM\ManyToMany(targetEntity="Ecole", inversedBy="idcursus")
     * @ORM\JoinTable(name="cursus_ecole",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idCursus", referencedColumnName="idCursus")
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

    public function getIdcursus(): ?int
    {
        return $this->idcursus;
    }

    public function getNomcursus(): ?string
    {
        return $this->nomcursus;
    }

    public function setNomcursus(string $nomcursus): self
    {
        $this->nomcursus = $nomcursus;

        return $this;
    }

    /**
     * @return Collection|Ecole[]
     */
    public function getIdecole(): Collection
    {
        return $this->idecole;
    }

    /**
     * @param int $idcursus
     */
    public function setIdcursus(int $idcursus)
    {
        $this->idcursus = $idcursus;
    }

    /**
     * @param Collection $idecole
     */
    public function setIdecole(Collection $idecole)
    {
        $this->idecole = $idecole;
    }


    public function addIdecole(Ecole $idecole): self
    {
        if (!$this->idecole->contains($idecole)) {
            $this->idecole[] = $idecole;
        }

        return $this;
    }

    public function removeIdecole(Ecole $idecole): self
    {
        if ($this->idecole->contains($idecole)) {
            $this->idecole->removeElement($idecole);
        }

        return $this;
    }

}
