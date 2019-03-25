<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Billetterie
 *
 * @ORM\Table(name="billetterie", indexes={@ORM\Index(name="BILLETTERIE_MATCHS_FK", columns={"ID_MATCHS"})})
 * @ORM\Entity
 */
class Billetterie
{
    /**
     * @var string
     *
     * @ORM\Column(name="NUMERO_BILLET", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numeroBillet;

    /**
     * @var int
     *
     * @ORM\Column(name="PRIX_BILLET", type="integer", nullable=false)
     */
    private $prixBillet;

    /**
     * @var \Matchs
     *
     * @ORM\ManyToOne(targetEntity="Matchs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_MATCHS", referencedColumnName="ID_MATCHS")
     * })
     */
    private $idMatchs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="numeroBillet")
     * @ORM\JoinTable(name="reserver",
     *   joinColumns={
     *     @ORM\JoinColumn(name="NUMERO_BILLET", referencedColumnName="NUMERO_BILLET")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_USER", referencedColumnName="ID_USER")
     *   }
     * )
     */
    private $idUser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUser = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getNumeroBillet(): ?string
    {
        return $this->numeroBillet;
    }

    public function getPrixBillet(): ?int
    {
        return $this->prixBillet;
    }

    public function setPrixBillet(int $prixBillet): self
    {
        $this->prixBillet = $prixBillet;

        return $this;
    }

    public function getIdMatchs(): ?Matchs
    {
        return $this->idMatchs;
    }

    public function setIdMatchs(?Matchs $idMatchs): self
    {
        $this->idMatchs = $idMatchs;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getIdUser(): Collection
    {
        return $this->idUser;
    }

    public function addIdUser(User $idUser): self
    {
        if (!$this->idUser->contains($idUser)) {
            $this->idUser[] = $idUser;
        }

        return $this;
    }

    public function removeIdUser(User $idUser): self
    {
        if ($this->idUser->contains($idUser)) {
            $this->idUser->removeElement($idUser);
        }

        return $this;
    }

}
