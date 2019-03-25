<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Equipes;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * News
 *
 * @ORM\Table(name="news", indexes={@ORM\Index(name="NEWS_EQUIPES_FK", columns={"ID_EQUIPE"})})
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 * @Vich\Uploadable
 */
class News
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_NEWS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNews;

    /**
     * @var string
     *
     * @ORM\Column(name="TITRE_NEWS", type="string", length=100, nullable=false)
     */
    private $titreNews;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CREATED_AT_NEWS", type="datetime", nullable=false)
     */
    private $createdAtNews;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TEXTE_NEWS", type="text", length=0, nullable=true)
     */
    private $texteNews;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DESCRIPTION_NEWS", type="text", length=65535, nullable=true)
     */
    private $descriptionNews;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMAGE_NEWS", type="string", length=255, nullable=true)
     */
    private $imageNews;

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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="news", fileNameProperty="IMAGE_NEWS")
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

    public function getIdNews(): ?int
    {
        return $this->idNews;
    }

    public function getTitreNews(): ?string
    {
        return $this->titreNews;
    }

    public function setTitreNews(string $titreNews): self
    {
        $this->titreNews = $titreNews;

        return $this;
    }

    public function getCreatedAtNews(): ?\DateTimeInterface
    {
        return $this->createdAtNews;
    }

    public function setCreatedAtNews(\DateTimeInterface $createdAtNews): self
    {
        $this->createdAtNews = $createdAtNews;

        return $this;
    }

    public function getTexteNews(): ?string
    {
        return $this->texteNews;
    }

    public function setTexteNews(?string $texteNews): self
    {
        $this->texteNews = $texteNews;

        return $this;
    }

    public function getDescriptionNews(): ?string
    {
        return $this->descriptionNews;
    }

    public function setDescriptionNews(?string $descriptionNews): self
    {
        $this->descriptionNews = $descriptionNews;

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

    public function __construct()
    {
        $this->createdAtNews = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function getImageNews()
    {
        return $this->imageNews;
    }

    public function setImageNews($imageNews)
    {
        $this->imageNews = $imageNews;

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
