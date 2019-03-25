<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classement
 *
 * @ORM\Table(name="classement", indexes={@ORM\Index(name="CLASSEMENT_JOURNEE_FK", columns={"ID_JOURNEE"})})
 * @ORM\Entity
 */
class Classement
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_CLASSEMENT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClassement;

    /**
     * @var int
     *
     * @ORM\Column(name="POSITION_CLASSEMENT", type="integer", nullable=false)
     */
    private $positionClassement;

    /**
     * @var int|null
     *
     * @ORM\Column(name="POINTS_CLASSLEMENT", type="integer", nullable=true)
     */
    private $pointsClassement;

    /**
     * @var int
     *
     * @ORM\Column(name="BUTS_MARQUES", type="integer", nullable=false)
     */
    private $butsMarques;

    /**
     * @var int
     *
     * @ORM\Column(name="BUTS_ENCAISSES", type="integer", nullable=false)
     */
    private $butsEncaisses;

    /**
     * @var \Journee
     *
     * @ORM\ManyToOne(targetEntity="Journee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_JOURNEE", referencedColumnName="ID_JOURNEE")
     * })
     */
    private $idJournee;

    public function getIdClassement(): ?int
    {
        return $this->idClassement;
    }

    public function getPositionClassement(): ?int
    {
        return $this->positionClassement;
    }

    public function setPositionClassement(int $positionClassement): self
    {
        $this->positionClassement = $positionClassement;

        return $this;
    }

    public function getPointsClassement(): ?int
    {
        return $this->pointsClassement;
    }

    public function setPointsClassement(?int $pointsClassement): self
    {
        $this->pointsClassement = $pointsClassement;

        return $this;
    }

    public function getButsMarques(): ?int
    {
        return $this->butsMarques;
    }

    public function setButsMarques(int $butsMarques): self
    {
        $this->butsMarques = $butsMarques;

        return $this;
    }

    public function getButsEncaisses(): ?int
    {
        return $this->butsEncaisses;
    }

    public function setButsEncaisses(int $butsEncaisses): self
    {
        $this->butsEncaisses = $butsEncaisses;

        return $this;
    }

    public function getIdJournee(): ?Journee
    {
        return $this->idJournee;
    }

    public function setIdJournee(?Journee $idJournee): self
    {
        $this->idJournee = $idJournee;

        return $this;
    }


}
