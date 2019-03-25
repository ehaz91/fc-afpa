<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="USER_VILLE_FK", columns={"ID_VILLE"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository") 
 * @UniqueEntity(
 * fields={"username"},
 * message="Ce pseudo est déja utilisé"
 * )
 * @UniqueEntity(
 * fields={"emailUser"},
 * message="Cette email correspond déja à un compte"
 * )
 */
class User implements UserInterface
{

    /**
     * @var int
     *
     * @ORM\Column(name="ID_USER", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_USER", type="string", length=50, nullable=false)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Your name cannot contain a number"
     * )
     */
    private $nomUser;

    /**
     * @var string
     *
     * @ORM\Column(name="PRENOM_USER", type="string", length=50, nullable=false)
     */
    private $prenomUser;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL_USER", type="string", length=300, nullable=false)
     * @Assert\Email(strict=true, message="Le format de l'email est incorrect")
     */
    private $emailUser;

    /**
     * @var string
     *
     * @ORM\Column(name="TELEPHONE_USER", type="string", length=20, nullable=false)
     */
    private $telephoneUser;

    /**
     * @var string
     *
     * @ORM\Column(name="ADRESSE_USER", type="string", length=250, nullable=false)
     */
    private $adresseUser;

    /**
     * @var string
     *
     * @ORM\Column(name="PASSWORD", type="string", length=275, nullable=false)
     * @Assert\Regex(pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+.{7,}$^", message="Le nouveau mot de passe doit posséder minimum une majuscule, un chiffre et être supérieur à 8 caractères.")
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="USERNAME", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isValide", type="boolean", nullable=true)
     */
    private $isvalide;

    /**
     * @var array|null
     *
     * @ORM\Column(name="ROLES", type="array", length=0, nullable=true)
     */
    private $roles;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DATE_INSCRIPTION", type="datetime", nullable=true)
     */
    private $dateInscription;

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_VILLE", referencedColumnName="ID_VILLE")
     * })
     */
    private $idVille;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Boutique", mappedBy="idUser")
     */
    private $idArticle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Billetterie", mappedBy="idUser")
     */
    private $numeroBillet;

    /** 
     * @Assert\EqualTo(propertyPath="password", message="Votre mot de passe doit correspondre")
     */  
    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $resetToken;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idArticle = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numeroBillet = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function getNomUser(): ?string
    {
        return $this->nomUser;
    }

    public function setNomUser(string $nomUser): self
    {
        $this->nomUser = $nomUser;

        return $this;
    }

    public function getPrenomUser(): ?string
    {
        return $this->prenomUser;
    }

    public function setPrenomUser(string $prenomUser): self
    {
        $this->prenomUser = $prenomUser;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->emailUser;
    }

    public function setEmailUser(string $emailUser): self
    {
        $this->emailUser = $emailUser;

        return $this;
    }

    public function getTelephoneUser(): ?string
    {
        return $this->telephoneUser;
    }

    public function setTelephoneUser(string $telephoneUser): self
    {
        $this->telephoneUser = $telephoneUser;

        return $this;
    }

    public function getAdresseUser(): ?string
    {
        return $this->adresseUser;
    }

    public function setAdresseUser(string $adresseUser): self
    {
        $this->adresseUser = $adresseUser;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getIsvalide(): ?bool
    {
        return $this->isvalide;
    }

    public function setIsvalide(?bool $isvalide): self
    {
        $this->isvalide = $isvalide;

        return $this;
    }

    public function getRoles(): ?array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(?\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getIdVille(): ?Ville
    {
        return $this->idVille;
    }

    public function setIdVille(?Ville $idVille): self
    {
        $this->idVille = $idVille;

        return $this;
    }

    public function eraseCredentials()
    {
        
    }

    public function getSalt()
    {
        return null;
    }

    /**
     * @return Collection|Boutique[]
     */
    public function getIdArticle(): Collection
    {
        return $this->idArticle;
    }

    public function addIdArticle(Boutique $idArticle): self
    {
        if (!$this->idArticle->contains($idArticle)) {
            $this->idArticle[] = $idArticle;
            $idArticle->addIdUser($this);
        }

        return $this;
    }

    public function removeIdArticle(Boutique $idArticle): self
    {
        if ($this->idArticle->contains($idArticle)) {
            $this->idArticle->removeElement($idArticle);
            $idArticle->removeIdUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|Billetterie[]
     */
    public function getNumeroBillet(): Collection
    {
        return $this->numeroBillet;
    }

    public function addNumeroBillet(Billetterie $numeroBillet): self
    {
        if (!$this->numeroBillet->contains($numeroBillet)) {
            $this->numeroBillet[] = $numeroBillet;
            $numeroBillet->addIdUser($this);
        }

        return $this;
    }

    public function removeNumeroBillet(Billetterie $numeroBillet): self
    {
        if ($this->numeroBillet->contains($numeroBillet)) {
            $this->numeroBillet->removeElement($numeroBillet);
            $numeroBillet->removeIdUser($this);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getResetToken(): string
    {
        return $this->resetToken;
    }
 
    /**
     * @param string $resetToken
     */
    public function setResetToken(?string $resetToken): void
    {
        $this->resetToken = $resetToken;
    }

}
