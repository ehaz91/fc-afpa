<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Staff
 *
 * @ORM\Table(name="staff", indexes={@ORM\Index(name="STAFF_ROLE_STAFF0_FK", columns={"ID_ROLE_STAFF"}), @ORM\Index(name="STAFF_EQUIPES_FK", columns={"ID_EQUIPE"})})
 * @ORM\Entity(repositoryClass="App\Repository\StaffRepository") 
 */
class Staff
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_STAFF", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStaff;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_STAFF", type="string", length=50, nullable=false)
     */
    private $nomStaff;

    /**
     * @var string
     *
     * @ORM\Column(name="PRENOM_STAFF", type="string", length=50, nullable=false)
     */
    private $prenomStaff;

    /**
     * @var \Equipes
     *
     * @ORM\ManyToOne(targetEntity="Equipes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_EQUIPE", referencedColumnName="ID_EQUIPE")
     * })
     */
    private $idEquipe;

    /**
     * @var \RoleStaff
     *
     * @ORM\ManyToOne(targetEntity="RoleStaff")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ROLE_STAFF", referencedColumnName="ID_ROLE_STAFF")
     * })
     */
    private $idRoleStaff;

    public function getIdStaff(): ?int
    {
        return $this->idStaff;
    }

    public function getNomStaff(): ?string
    {
        return $this->nomStaff;
    }

    public function setNomStaff(string $nomStaff): self
    {
        $this->nomStaff = $nomStaff;

        return $this;
    }

    public function getPrenomStaff(): ?string
    {
        return $this->prenomStaff;
    }

    public function setPrenomStaff(string $prenomStaff): self
    {
        $this->prenomStaff = $prenomStaff;

        return $this;
    }

    public function getIdEquipe(): ?Equipes
    {
        return $this->idEquipe;
    }

    public function setIdEquipe(?Equipes $idEquipe): self
    {
        $this->idEquipe = $idEquipe;

        return $this;
    }

    public function getIdRoleStaff(): ?RoleStaff
    {
        return $this->idRoleStaff;
    }

    public function setIdRoleStaff(?RoleStaff $idRoleStaff): self
    {
        $this->idRoleStaff = $idRoleStaff;

        return $this;
    }


}
