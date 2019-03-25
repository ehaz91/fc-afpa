<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departements
 *
 * @ORM\Table(name="departements", indexes={@ORM\Index(name="DEPARTEMENTS_REGIONS_FK", columns={"CODE_REGIONS"})})
 * @ORM\Entity
 */
class Departements
{
    /**
     * @var string
     *
     * @ORM\Column(name="CODE_DEPARTEMENT", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeDepartement;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_DEPARTEMENT", type="string", length=50, nullable=false)
     */
    private $nomDepartement;

    /**
     * @var \Regions
     *
     * @ORM\ManyToOne(targetEntity="Regions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODE_REGIONS", referencedColumnName="CODE_REGIONS")
     * })
     */
    private $codeRegions;

    public function getCodeDepartement(): ?string
    {
        return $this->codeDepartement;
    }

    public function getNomDepartement(): ?string
    {
        return $this->nomDepartement;
    }

    public function setNomDepartement(string $nomDepartement): self
    {
        $this->nomDepartement = $nomDepartement;

        return $this;
    }

    public function getCodeRegions(): ?Regions
    {
        return $this->codeRegions;
    }

    public function setCodeRegions(?Regions $codeRegions): self
    {
        $this->codeRegions = $codeRegions;

        return $this;
    }


}
