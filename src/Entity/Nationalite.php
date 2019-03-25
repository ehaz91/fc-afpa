<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nationalite
 *
 * @ORM\Table(name="nationalite")
 * @ORM\Entity
 */
class Nationalite
{
    /**
     * @var string
     *
     * @ORM\Column(name="ID_NATIONALITE", type="string", length=3, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="NATIONALITE", type="string", length=75, nullable=false)
     */
    private $nationalite;

    public function getIdNationalite(): ?string
    {
        return $this->idNationalite;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }


}
