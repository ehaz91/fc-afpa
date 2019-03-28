<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JoueurRepository")
 */
class Joueur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomJoueur;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $prenomJoueur;

    /**
     * @ORM\Column(type="integer")
     */
    private $ageJoueur;

    /**
     * @ORM\Column(type="integer")
     */
    private $numMaillotJoueur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe", inversedBy="composer")
     */
    private $equipe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PosteJoueur", inversedBy="occuper")
     * @ORM\JoinColumn(nullable=false)
     */
    private $posteJoueur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Matchs")
     */
    private $jouer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Nationalite", inversedBy="porter")
     */
    private $nationalite;

    public function __construct()
    {
        $this->jouer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomJoueur(): ?string
    {
        return $this->nomJoueur;
    }

    public function setNomJoueur(string $nomJoueur): self
    {
        $this->nomJoueur = $nomJoueur;

        return $this;
    }

    public function getPrenomJoueur(): ?string
    {
        return $this->prenomJoueur;
    }

    public function setPrenomJoueur(?string $prenomJoueur): self
    {
        $this->prenomJoueur = $prenomJoueur;

        return $this;
    }

    public function getAgeJoueur(): ?int
    {
        return $this->ageJoueur;
    }

    public function setAgeJoueur(int $ageJoueur): self
    {
        $this->ageJoueur = $ageJoueur;

        return $this;
    }

    public function getNumMaillotJoueur(): ?int
    {
        return $this->numMaillotJoueur;
    }

    public function setNumMaillotJoueur(int $numMaillotJoueur): self
    {
        $this->numMaillotJoueur = $numMaillotJoueur;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getPosteJoueur(): ?PosteJoueur
    {
        return $this->posteJoueur;
    }

    public function setPosteJoueur(?PosteJoueur $posteJoueur): self
    {
        $this->posteJoueur = $posteJoueur;

        return $this;
    }

    /**
     * @return Collection|Matchs[]
     */
    public function getJouer(): Collection
    {
        return $this->jouer;
    }

    public function addJouer(Matchs $jouer): self
    {
        if (!$this->jouer->contains($jouer)) {
            $this->jouer[] = $jouer;
        }

        return $this;
    }

    public function removeJouer(Matchs $jouer): self
    {
        if ($this->jouer->contains($jouer)) {
            $this->jouer->removeElement($jouer);
        }

        return $this;
    }

    public function getNationalite(): ?Nationalite
    {
        return $this->nationalite;
    }

    public function setNationalite(?Nationalite $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }
}
