<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PosteJoueurs
 *
 * @ORM\Table(name="poste_joueurs")
 * @ORM\Entity
 */
class PosteJoueurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_POSTE_JOUEUR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPosteJoueur;

    /**
     * @var string
     *
     * @ORM\Column(name="POSTE_JOUEUR", type="string", length=10, nullable=false)
     */
    private $posteJoueur;

    /**
     * Get the value of idPosteJoueur
     *
     * @return  int
     */ 
    public function getIdPosteJoueur()
    {
        return $this->idPosteJoueur;
    }

    /**
     * Get the value of posteJoueur
     *
     * @return  string
     */ 
    public function getPosteJoueur()
    {
        return $this->posteJoueur;
    }

    /**
     * Set the value of posteJoueur
     *
     * @param  string  $posteJoueur
     *
     * @return  self
     */ 
    public function setPosteJoueur(string $posteJoueur)
    {
        $this->posteJoueur = $posteJoueur;

        return $this;
    }
}