<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Equipes
 *
 * @ORM\Table(name="equipes", indexes={@ORM\Index(name="EQUIPES_VILLE_FK", columns={"ID_VILLE"})})
 * @ORM\Entity
 */
class Equipes
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_EQUIPE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEquipe;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_EQUIPE", type="string", length=50, nullable=false)
     */
    private $nomEquipe;

    /**
     * @var string
     * 
     * @ORM\Column(name="STADE", type="string", length=255, nullable=false)
     */
    private $stade;

    /**
     * @var string
     * 
     * @ORM\Column(name="LOGO", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_VILLE", referencedColumnName="ID_VILLE")
     * })
     */
    private $idVille;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Sponsors", mappedBy="idEquipe")
     */
    private $idSponsors;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idSponsors = new \Doctrine\Common\Collections\ArrayCollection();
    }

   

     public function __toString()
    {
        return $this->nomEquipe;
    }

    public function getIdEquipe()
    {
        return $this->idEquipe;
    }

    public function getNomEquipe()
    {
        return $this->nomEquipe;
    }

    public function setNomEquipe(string $nomEquipe)
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    public function getStade()
    {
        return $this->stade;
    }

    public function setStade(string $stade)
    {
        $this->stade = $stade;

        return $this;
    }
 
    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo(string $logo)
    {
        $this->logo = $logo;

        return $this;
    }

    public function getIdVille(): ?Ville
    {
        return $this->idVille;
    }

    public function setIdVille(?Ville $idVille): self
    {
        $this->idVille = $idVille;

        return $this;
    }

    /**
     * @return Collection|Sponsors[]
     */
    public function getIdSponsors(): Collection
    {
        return $this->idSponsors;
    }

    public function addIdSponsor(Sponsors $idSponsor): self
    {
        if (!$this->idSponsors->contains($idSponsor)) {
            $this->idSponsors[] = $idSponsor;
            $idSponsor->addIdEquipe($this);
        }

        return $this;
    }

    public function removeIdSponsor(Sponsors $idSponsor): self
    {
        if ($this->idSponsors->contains($idSponsor)) {
            $this->idSponsors->removeElement($idSponsor);
            $idSponsor->removeIdEquipe($this);
        }

        return $this;
    }
}
