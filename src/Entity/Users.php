<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", indexes={@ORM\Index(name="eleve_classe", columns={"idClasse"}), @ORM\Index(name="admin_ecole", columns={"idEcole"}), @ORM\Index(name="parent", columns={"parent"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="identifiant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=50, nullable=false)
     */
    private $telephone;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=25, nullable=false)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=20, nullable=false)
     */
    private $photo;

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
     * @var \Classe
     *
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClasse", referencedColumnName="idClasse")
     * })
     */
    private $idclasse;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent", referencedColumnName="identifiant")
     * })
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Evaluation", inversedBy="ideleve")
     * @ORM\JoinTable(name="note",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idEleve", referencedColumnName="identifiant")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idEvaluation", referencedColumnName="idEvaluation")
     *   }
     * )
     */
    private $idevaluation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idevaluation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdentifiant(): ?int
    {
        return $this->identifiant;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

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

    public function getIdclasse(): ?Classe
    {
        return $this->idclasse;
    }

    public function setIdclasse(?Classe $idclasse): self
    {
        $this->idclasse = $idclasse;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

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

}
