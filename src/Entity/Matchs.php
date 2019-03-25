<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Matchs
 *
 * @ORM\Table(name="matchs", indexes={@ORM\Index(name="MATCHS_EQUIPES1_FK", columns={"ID_EQUIPE_EQUIPES"}), @ORM\Index(name="MATCHS_EQUIPES_FK", columns={"ID_EQUIPE"}), @ORM\Index(name="MATCHS_JOURNEE0_FK", columns={"ID_JOURNEE"})})
 * @ORM\Entity
 */
class Matchs
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_MATCHS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMatchs;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_MATCHS", type="datetime", nullable=false)
     */
    private $dateMatchs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RESUME_MATCHS", type="text", length=65535, nullable=true)
     */
    private $resumeMatchs;

     /**
     * @var string|null
     *
     * @ORM\Column(name="TITRE_MATCH", type="string", length=255, nullable=true)
     */
    private $titreMatch;

    /**
     * @var int
     *
     * @ORM\Column(name="SCORE_EQUIPE1", type="integer", nullable=false)
     */
    private $scoreEquipe1;

    /**
     * @var int
     *
     * @ORM\Column(name="SCORE_EQUIPE2", type="integer", nullable=false)
     */
    private $scoreEquipe2;

    /**
     * @var \Equipes
     *
     * @ORM\ManyToOne(targetEntity="Equipes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_EQUIPE_EQUIPES", referencedColumnName="ID_EQUIPE")
     * })
     */
    private $idEquipeEquipes;

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
     * @var \Journee
     *
     * @ORM\ManyToOne(targetEntity="Journee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_JOURNEE", referencedColumnName="ID_JOURNEE")
     * })
     */
    private $idJournee;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="JoueursEquipe", inversedBy="idMatchs")
     * @ORM\JoinTable(name="jouer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_MATCHS", referencedColumnName="ID_MATCHS")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_JOUEUR_EQUIPE", referencedColumnName="ID_JOUEUR_EQUIPE")
     *   }
     * )
     */
    private $idJoueurEquipe;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idJoueurEquipe = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdMatchs()
    {
        return $this->idMatchs;
    }

    public function setIdMatchs(int $idMatchs)
    {
        $this->idMatchs = $idMatchs;

        return $this;
    }

    /**
     * Get the value of dateMatchs
     *
     * @return  \DateTime
     */ 
    public function getDateMatchs()
    {
        return $this->dateMatchs;
    }

    /**
     * Set the value of dateMatchs
     *
     * @param  \DateTime  $dateMatchs
     *
     * @return  self
     */ 
    public function setDateMatchs(\DateTime $dateMatchs)
    {
        $this->dateMatchs = $dateMatchs;

        return $this;
    }

    /**
     * Get the value of resumeMatchs
     *
     * @return  string|null
     */ 
    public function getResumeMatchs()
    {
        return $this->resumeMatchs;
    }

    /**
     * Set the value of resumeMatchs
     *
     * @param  string|null  $resumeMatchs
     *
     * @return  self
     */ 
    public function setResumeMatchs($resumeMatchs)
    {
        $this->resumeMatchs = $resumeMatchs;

        return $this;
    }

    /**
     * Get the value of scoreEquipe1
     *
     * @return  int
     */ 
    public function getScoreEquipe1()
    {
        return $this->scoreEquipe1;
    }

    /**
     * Set the value of scoreEquipe1
     *
     * @param  int  $scoreEquipe1
     *
     * @return  self
     */ 
    public function setScoreEquipe1(int $scoreEquipe1)
    {
        $this->scoreEquipe1 = $scoreEquipe1;

        return $this;
    }

    /**
     * Get the value of scoreEquipe2
     *
     * @return  int
     */ 
    public function getScoreEquipe2()
    {
        return $this->scoreEquipe2;
    }

    /**
     * Set the value of scoreEquipe2
     *
     * @param  int  $scoreEquipe2
     *
     * @return  self
     */ 
    public function setScoreEquipe2(int $scoreEquipe2)
    {
        $this->scoreEquipe2 = $scoreEquipe2;

        return $this;
    }

    /**
     * Get the value of idEquipeEquipes
     *
     * @return  \Equipes
     */ 
    public function getIdEquipeEquipes()
    {
        return $this->idEquipeEquipes;
    }

    /**
     * Set the value of idEquipeEquipes
     *
     * @param  \Equipes  $idEquipeEquipes
     *
     * @return  self
     */ 
    public function setIdEquipeEquipes(\Equipes $idEquipeEquipes)
    {
        $this->idEquipeEquipes = $idEquipeEquipes;

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
    
    public function __toString()
    {
        return $this->nomEquipe;
    }

    /**
     * Get the value of idJournee
     *
     * @return  \Journee
     */ 
    public function getIdJournee()
    {
        return $this->idJournee;
    }

    /**
     * Set the value of idJournee
     *
     * @param  \Journee  $idJournee
     *
     * @return  self
     */ 
    public function setIdJournee(\Journee $idJournee)
    {
        $this->idJournee = $idJournee;

        return $this;
    }

    public function getTitreMatch(): ?string
    {
        return $this->titreMatch;
    }

    public function setTitreMatch(string $titreMatch): self
    {
        $this->titreMatch = $titreMatch;

        return $this;
    }

    /**
     * Get the value of idJoueurEquipe
     *
     * @return  \Doctrine\Common\Collections\Collection
     */ 
    public function getIdJoueurEquipe()
    {
        return $this->idJoueurEquipe;
    }

    /**
     * Set the value of idJoueurEquipe
     *
     * @param  \Doctrine\Common\Collections\Collection  $idJoueurEquipe
     *
     * @return  self
     */ 
    public function setIdJoueurEquipe(\Doctrine\Common\Collections\Collection $idJoueurEquipe)
    {
        $this->idJoueurEquipe = $idJoueurEquipe;

        return $this;
    }

    public function addIdJoueurEquipe(JoueursEquipe $idJoueurEquipe): self
    {
        if (!$this->idJoueurEquipe->contains($idJoueurEquipe)) {
            $this->idJoueurEquipe[] = $idJoueurEquipe;
        }

        return $this;
    }

    public function removeIdJoueurEquipe(JoueursEquipe $idJoueurEquipe): self
    {
        if ($this->idJoueurEquipe->contains($idJoueurEquipe)) {
            $this->idJoueurEquipe->removeElement($idJoueurEquipe);
        }

        return $this;
    }
}
