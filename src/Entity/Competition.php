<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Competition
 *
 * @ORM\Table(name="competition", indexes={@ORM\Index(name="COMPETITION_EQUIPES_FK", columns={"ID_EQUIPE"})})
 * @ORM\Entity
 */
class Competition
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_COMPETITION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCompetition;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_COMPETITION", type="string", length=50, nullable=false)
     */
    private $nomCompetition;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_DEBUT_COMP", type="date", nullable=false)
     */
    private $dateDebutComp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_FIN_COMP", type="date", nullable=false)
     */
    private $dateFinComp;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Saison", mappedBy="idCompetition")
     */
    private $idSaison;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idSaison = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdCompetition(): ?int
    {
        return $this->idCompetition;
    }

    public function getNomCompetition(): ?string
    {
        return $this->nomCompetition;
    }

    public function setNomCompetition(string $nomCompetition): self
    {
        $this->nomCompetition = $nomCompetition;

        return $this;
    }

    public function getDateDebutComp(): ?\DateTimeInterface
    {
        return $this->dateDebutComp;
    }

    public function setDateDebutComp(\DateTimeInterface $dateDebutComp): self
    {
        $this->dateDebutComp = $dateDebutComp;

        return $this;
    }

    public function getDateFinComp(): ?\DateTimeInterface
    {
        return $this->dateFinComp;
    }

    public function setDateFinComp(\DateTimeInterface $dateFinComp): self
    {
        $this->dateFinComp = $dateFinComp;

        return $this;
    }

    public function getIdEquipe(): ?Equipes
    {
        return $this->idEquipe;
    }

    public function setIdEquipe(?Equipes $idEquipe): self
    {
        $this->idEquipe = $idEquipe;

        return $this;
    }

    /**
     * @return Collection|Saison[]
     */
    public function getIdSaison(): Collection
    {
        return $this->idSaison;
    }

    public function addIdSaison(Saison $idSaison): self
    {
        if (!$this->idSaison->contains($idSaison)) {
            $this->idSaison[] = $idSaison;
            $idSaison->addIdCompetition($this);
        }

        return $this;
    }

    public function removeIdSaison(Saison $idSaison): self
    {
        if ($this->idSaison->contains($idSaison)) {
            $this->idSaison->removeElement($idSaison);
            $idSaison->removeIdCompetition($this);
        }

        return $this;
    }

}
