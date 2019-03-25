<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regions
 *
 * @ORM\Table(name="regions", indexes={@ORM\Index(name="REGIONS_NOUVELLES_REGIONS_FK", columns={"CODE_NOUVELLES_REGIONS"})})
 * @ORM\Entity(repositoryClass="App\Repository\RegionsRepository") 
 */
class Regions
{
    /**
     * @var string
     *
     * @ORM\Column(name="CODE_REGIONS", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeRegions;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_REGIONS", type="string", length=50, nullable=false)
     */
    private $nomRegions;

    /**
     * @var \NouvellesRegions
     *
     * @ORM\ManyToOne(targetEntity="NouvellesRegions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CODE_NOUVELLES_REGIONS", referencedColumnName="CODE_NOUVELLES_REGIONS")
     * })
     */
    private $codeNouvellesRegions;

    public function getCodeRegions(): ?string
    {
        return $this->codeRegions;
    }

    public function getNomRegions(): ?string
    {
        return $this->nomRegions;
    }

    public function setNomRegions(string $nomRegions): self
    {
        $this->nomRegions = $nomRegions;

        return $this;
    }

    public function getCodeNouvellesRegions(): ?NouvellesRegions
    {
        return $this->codeNouvellesRegions;
    }

    public function setCodeNouvellesRegions(?NouvellesRegions $codeNouvellesRegions): self
    {
        $this->codeNouvellesRegions = $codeNouvellesRegions;

        return $this;
    }


}
