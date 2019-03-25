<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville", indexes={@ORM\Index(name="VILLE_DEPARTEMENTS_FK", columns={"CODE_DEPARTEMENT"})})
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository") 
 */
class Ville
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_VILLE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVille;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_VILLE", type="string", length=100, nullable=false)
     */
    private $nomVille;

    /**
     * @var string
     *
     * @ORM\Column(name="CP_VILLE", type="string", length=10, nullable=false)
     */
    private $cpVille;

    /**
     * @var string
     *
     * @ORM\Column(name="CODE_INSEE", type="string", length=10, nullable=false)
     */
    private $codeInsee;

    /**
     * @var \Departements
     *
     * @ORM\ManyToOne(targetEntity="Departements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODE_DEPARTEMENT", referencedColumnName="CODE_DEPARTEMENT")
     * })
     */
    private $codeDepartement;

    public function getIdVille(): ?int
    {
        return $this->idVille;
    }

    public function __toString()
    {
        return (string) $this->idVille;
    }

    public function getNomVille(): ?string
    {
        return $this->nomVille;
    }

    public function setNomVille(string $nomVille): self
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    public function getCpVille(): ?string
    {
        return $this->cpVille;
    }

    public function setCpVille(string $cpVille): self
    {
        $this->cpVille = $cpVille;

        return $this;
    }

    public function getCodeInsee(): ?string
    {
        return $this->codeInsee;
    }

    public function setCodeInsee(string $codeInsee): self
    {
        $this->codeInsee = $codeInsee;

        return $this;
    }

    public function getCodeDepartement(): ?Departements
    {
        return $this->codeDepartement;
    }

    public function setCodeDepartement(?Departements $codeDepartement): self
    {
        $this->codeDepartement = $codeDepartement;

        return $this;
    }


}
