<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Saison
 *
 * @ORM\Table(name="saison")
 * @ORM\Entity(repositoryClass="App\Repository\SaisonRepository") 
 */
class Saison
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_SAISON", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSaison;

    /**
     * @var string
     *
     * @ORM\Column(name="SAISON", type="string", length=14, nullable=false)
     */
    private $saison;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Competition", inversedBy="idSaison")
     * @ORM\JoinTable(name="englober",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_SAISON", referencedColumnName="ID_SAISON")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_COMPETITION", referencedColumnName="ID_COMPETITION")
     *   }
     * )
     */
    private $idCompetition;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCompetition = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdSaison(): ?int
    {
        return $this->idSaison;
    }

    public function getSaison(): ?string
    {
        return $this->saison;
    }

    public function setSaison(string $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * @return Collection|Competition[]
     */
    public function getIdCompetition(): Collection
    {
        return $this->idCompetition;
    }

    public function addIdCompetition(Competition $idCompetition): self
    {
        if (!$this->idCompetition->contains($idCompetition)) {
            $this->idCompetition[] = $idCompetition;
        }

        return $this;
    }

    public function removeIdCompetition(Competition $idCompetition): self
    {
        if ($this->idCompetition->contains($idCompetition)) {
            $this->idCompetition->removeElement($idCompetition);
        }

        return $this;
    }

}
