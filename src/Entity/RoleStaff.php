<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoleStaff
 *
 * @ORM\Table(name="role_staff")
 * @ORM\Entity(repositoryClass="App\Repository\RoleStaffRepository") 
 */
class RoleStaff
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_ROLE_STAFF", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRoleStaff;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_ROLE_STAFF", type="string", length=100, nullable=false)
     */
    private $nomRoleStaff;

    public function getIdRoleStaff(): ?int
    {
        return $this->idRoleStaff;
    }

    public function getNomRoleStaff(): ?string
    {
        return $this->nomRoleStaff;
    }

    public function setNomRoleStaff(string $nomRoleStaff): self
    {
        $this->nomRoleStaff = $nomRoleStaff;

        return $this;
    }


}
