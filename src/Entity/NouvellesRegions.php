<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NouvellesRegions
 *
 * @ORM\Table(name="nouvelles_regions")
 * @ORM\Entity(repositoryClass="App\Repository\NouvellesRegionsRepository") 
 */
class NouvellesRegions
{
    /**
     * @var string
     *
     * @ORM\Column(name="CODE_NOUVELLES_REGIONS", type="string", length=5, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeNouvellesRegions;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_NOUVELLES_REGIONS", type="string", length=50, nullable=false)
     */
    private $nomNouvellesRegions;

    public function getCodeNouvellesRegions(): ?string
    {
        return $this->codeNouvellesRegions;
    }

    public function getNomNouvellesRegions(): ?string
    {
        return $this->nomNouvellesRegions;
    }

    public function setNomNouvellesRegions(string $nomNouvellesRegions): self
    {
        $this->nomNouvellesRegions = $nomNouvellesRegions;

        return $this;
    }


}
