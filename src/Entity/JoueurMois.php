<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JoueurMois
 *
 * @ORM\Table(name="joueur_mois", indexes={@ORM\Index(name="JOUEUR_MOIS_EQUIPES_FK", columns={"ID_EQUIPE"})})
 * @ORM\Entity
 */
class JoueurMois
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_JOUEUR_MOIS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJoueurMois;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPTION_JOUEUR_MOIS", type="text", length=65535, nullable=false)
     */
    private $descriptionJoueurMois;

    /**
     * @var \Equipes
     *
     * @ORM\ManyToOne(targetEntity="Equipes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_EQUIPE", referencedColumnName="ID_EQUIPE")
     * })
     */
    private $idEquipe;


}
