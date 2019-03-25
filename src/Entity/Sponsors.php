<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Sponsors
 *
 * @ORM\Table(name="sponsors")
 * @ORM\Entity(repositoryClass="App\Repository\SponsorsRepository") 
 * @Vich\Uploadable
 */
class Sponsors
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_SPONSORS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSponsors;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_SPONSORS", type="string", length=50, nullable=false)
     */
    private $nomSponsors;

    /**
     * @var string
     *
     * @ORM\Column(name="LOGO_SPONSORS", type="string", length=255, nullable=false)
     */
    private $logoSponsors;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Equipes", inversedBy="idSponsors")
     * @ORM\JoinTable(name="sponsoriser",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_SPONSORS", referencedColumnName="ID_SPONSORS")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_EQUIPE", referencedColumnName="ID_EQUIPE")
     *   }
     * )
     */
    private $idEquipe;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="sponsors", fileNameProperty="LOGO_SPONSORS")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idEquipe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->updatedAt = new \DateTime();
    }

    public function getIdSponsors(): ?int
    {
        return $this->idSponsors;
    }

    public function getNomSponsors(): ?string
    {
        return $this->nomSponsors;
    }

    public function setNomSponsors(string $nomSponsors): self
    {
        $this->nomSponsors = $nomSponsors;

        return $this;
    }

    /**
     * @return Collection|Equipes[]
     */
    public function getIdEquipe(): Collection
    {
        return $this->idEquipe;
    }

    public function addIdEquipe(Equipes $idEquipe): self
    {
        if (!$this->idEquipe->contains($idEquipe)) {
            $this->idEquipe[] = $idEquipe;
        }

        return $this;
    }

    public function removeIdEquipe(Equipes $idEquipe): self
    {
        if ($this->idEquipe->contains($idEquipe)) {
            $this->idEquipe->removeElement($idEquipe);
        }

        return $this;
    }

    public function getLogoSponsors()
    {
        return $this->logoSponsors;
    }

    public function setLogoSponsors(?string $logoSponsors)
    {
        $this->logoSponsors = $logoSponsors;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
}
