<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Journee
 *
 * @ORM\Table(name="journee", indexes={@ORM\Index(name="JOURNEE_SAISON_FK", columns={"ID_SAISON"})})
 * @ORM\Entity
 */
class Journee
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_JOURNEE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJournee;

    /**
     * @var string
     *
     * @ORM\Column(name="NUM_JOURNEE", type="string", length=12, nullable=false)
     */
    private $numJournee;

    /**
     * @var \Saison
     *
     * @ORM\ManyToOne(targetEntity="Saison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SAISON", referencedColumnName="ID_SAISON")
     * })
     */
    private $idSaison;



    /**
     * Get the value of idJournee
     *
     * @return  int
     */ 
    public function getIdJournee()
    {
        return $this->idJournee;
    }

    /**
     * Set the value of idJournee
     *
     * @param  int  $idJournee
     *
     * @return  self
     */ 
    public function setIdJournee(int $idJournee)
    {
        $this->idJournee = $idJournee;

        return $this;
    }

    /**
     * Get the value of numJournee
     *
     * @return  string
     */ 
    public function getNumJournee()
    {
        return $this->numJournee;
    }

    /**
     * Set the value of numJournee
     *
     * @param  string  $numJournee
     *
     * @return  self
     */ 
    public function setNumJournee(string $numJournee)
    {
        $this->numJournee = $numJournee;

        return $this;
    }

    /**
     * Get the value of idSaison
     *
     * @return  \Saison
     */ 
    public function getIdSaison()
    {
        return $this->idSaison;
    }


    public function __toString(){
        return (string) $this->idJournee;
    }

    public function setIdSaison(?Saison $idSaison): self
    {
        $this->idSaison = $idSaison;

        return $this;
    }
}
