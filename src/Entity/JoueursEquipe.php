<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * JoueursEquipe
 *
 * @ORM\Table(name="joueurs_equipe", indexes={@ORM\Index(name="JOUEURS_EQUIPE_EQUIPES_FK", columns={"ID_EQUIPE"}), @ORM\Index(name="JOUEURS_EQUIPE_NATIONALITE0_FK", columns={"ID_NATIONALITE"})})
 * @ORM\Entity
 */
class JoueursEquipe
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_JOUEUR_EQUIPE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJoueurEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_JOUEUR_EQUIPE", type="string", length=50, nullable=false)
     */
    private $nomJoueurEquipe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRENOM_JOUEUR_EQUIPE", type="string", length=50, nullable=true)
     */
    private $prenomJoueurEquipe;

    /**
     * @var int
     *
     * @ORM\Column(name="AGE_JOUEUR", type="integer", nullable=false)
     */
    private $ageJoueur;

    /**
     * @var int
     *
     * @ORM\Column(name="NUM_MAILLOT_EQUIPE", type="integer", nullable=false)
     */
    private $numMaillotEquipe;

    /**
     * @var \Equipes
     *
     * @ORM\ManyToOne(targetEntity="Equipes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_EQUIPE", referencedColumnName="ID_EQUIPE")
     * })
     */
    private $idEquipe;

    /**
     * @var \Nationalite
     *
     * @ORM\ManyToOne(targetEntity="Nationalite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_NATIONALITE", referencedColumnName="ID_NATIONALITE")
     * })
     */
    private $idNationalite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Matchs", mappedBy="idJoueurEquipe")
     */
    private $idMatchs;

    /**
     * @var \PosteJoueurs
     * 
     * @ORM\ManyToOne(targetEntity="PosteJoueurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_POSTE_JOUEUR", referencedColumnName="ID_POSTE_JOUEUR")
     * })
     */
    private $idPosteJoueur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idMatchs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString(){
        return (string) $this->idJoueurEquipe;
    }


    /**
     * Get the value of idJoueurEquipe
     *
     * @return  int
     */ 
    public function getIdJoueurEquipe()
    {
        return $this->idJoueurEquipe;
    }

    /**
     * Set the value of idJoueurEquipe
     *
     * @param  int  $idJoueurEquipe
     *
     * @return  self
     */ 
    public function setIdJoueurEquipe(int $idJoueurEquipe)
    {
        $this->idJoueurEquipe = $idJoueurEquipe;

        return $this;
    }

    /**
     * Get the value of nomJoueurEquipe
     *
     * @return  string
     */ 
    public function getNomJoueurEquipe()
    {
        return $this->nomJoueurEquipe;
    }

    /**
     * Set the value of nomJoueurEquipe
     *
     * @param  string  $nomJoueurEquipe
     *
     * @return  self
     */ 
    public function setNomJoueurEquipe(string $nomJoueurEquipe)
    {
        $this->nomJoueurEquipe = $nomJoueurEquipe;

        return $this;
    }

    /**
     * Get the value of prenomJoueurEquipe
     *
     * @return  string|null
     */ 
    public function getPrenomJoueurEquipe()
    {
        return $this->prenomJoueurEquipe;
    }

    /**
     * Set the value of prenomJoueurEquipe
     *
     * @param  string|null  $prenomJoueurEquipe
     *
     * @return  self
     */ 
    public function setPrenomJoueurEquipe($prenomJoueurEquipe)
    {
        $this->prenomJoueurEquipe = $prenomJoueurEquipe;

        return $this;
    }

    /**
     * Get the value of ageJoueur
     *
     * @return  int
     */ 
    public function getAgeJoueur()
    {
        return $this->ageJoueur;
    }

    /**
     * Set the value of ageJoueur
     *
     * @param  int  $ageJoueur
     *
     * @return  self
     */ 
    public function setAgeJoueur(int $ageJoueur)
    {
        $this->ageJoueur = $ageJoueur;

        return $this;
    }

    /**
     * Get the value of numMaillotEquipe
     *
     * @return  int
     */ 
    public function getNumMaillotEquipe()
    {
        return $this->numMaillotEquipe;
    }

    /**
     * Set the value of numMaillotEquipe
     *
     * @param  int  $numMaillotEquipe
     *
     * @return  self
     */ 
    public function setNumMaillotEquipe(int $numMaillotEquipe)
    {
        $this->numMaillotEquipe = $numMaillotEquipe;

        return $this;
    }

    /**
     * Get the value of idEquipe
     *
     * @return  \Equipes
     */ 
    public function getIdEquipe()
    {
        return $this->idEquipe;
    }

    /**
     * Set the value of idEquipe
     *
     * @param  \Equipes  $idEquipe
     *
     * @return  self
     */ 
    public function setIdEquipe(\Equipes $idEquipe)
    {
        $this->idEquipe = $idEquipe;

        return $this;
    }

    /**
     * Get the value of idNationalite
     *
     * @return  \Nationalite
     */ 
    public function getIdNationalite()
    {
        return $this->idNationalite;
    }

    /**
     * Set the value of idNationalite
     *
     * @param  \Nationalite  $idNationalite
     *
     * @return  self
     */ 
    public function setIdNationalite(\Nationalite $idNationalite)
    {
        $this->idNationalite = $idNationalite;

        return $this;
    }

    /**
     * Get the value of idMatchs
     *
     * @return  \Doctrine\Common\Collections\Collection
     */ 
    public function getIdMatchs()
    {
        return $this->idMatchs;
    }

    /**
     * Set the value of idMatchs
     *
     * @param  \Doctrine\Common\Collections\Collection  $idMatchs
     *
     * @return  self
     */ 
    public function setIdMatchs(\Doctrine\Common\Collections\Collection $idMatchs)
    {
        $this->idMatchs = $idMatchs;

        return $this;
    }

    public function addIdMatch(Matchs $idMatch): self
    {
        if (!$this->idMatchs->contains($idMatch)) {
            $this->idMatchs[] = $idMatch;
            $idMatch->addIdJoueurEquipe($this);
        }

        return $this;
    }

    public function removeIdMatch(Matchs $idMatch): self
    {
        if ($this->idMatchs->contains($idMatch)) {
            $this->idMatchs->removeElement($idMatch);
            $idMatch->removeIdJoueurEquipe($this);
        }

        return $this;
    }

    /**
     * Get the value of idPosteJoueur
     *
     * @return  \PosteJoueurs
     */ 
    public function getIdPosteJoueur()
    {
        return $this->idPosteJoueur;
    }

    /**
     * Set the value of idPosteJoueur
     *
     * @param  \PosteJoueurs  $idPosteJoueur
     *
     * @return  self
     */ 
    public function setIdPosteJoueur(\PosteJoueurs $idPosteJoueur)
    {
        $this->idPosteJoueur = $idPosteJoueur;

        return $this;
    }
}
