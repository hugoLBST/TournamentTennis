<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TournoiRepository")
 */
class Tournoi
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebutTournoi;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFinTournoi;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estVisible;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $categorieAge;

    /**
     * @ORM\Column(type="boolean")
     */
    private $genreHomme;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebutInscription;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFinInscription;

    /**
     * @ORM\Column(type="boolean")
     */
    private $inscriptionManuelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombrePlaces;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $motDePasse;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validationInscriptions;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbSetsGagnants;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateDebutTournoi(): ?\DateTimeInterface
    {
        return $this->dateDebutTournoi;
    }

    public function setDateDebutTournoi(\DateTimeInterface $dateDebutTournoi): self
    {
        $this->dateDebutTournoi = $dateDebutTournoi;

        return $this;
    }

    public function getDateFinTournoi(): ?\DateTimeInterface
    {
        return $this->dateFinTournoi;
    }

    public function setDateFinTournoi(\DateTimeInterface $dateFinTournoi): self
    {
        $this->dateFinTournoi = $dateFinTournoi;

        return $this;
    }

    public function getEstVisible(): ?bool
    {
        return $this->estVisible;
    }

    public function setEstVisible(bool $estVisible): self
    {
        $this->estVisible = $estVisible;

        return $this;
    }

    public function getSurface(): ?string
    {
        return $this->surface;
    }

    public function setSurface(string $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getCategorieAge(): ?string
    {
        return $this->categorieAge;
    }

    public function setCategorieAge(string $categorieAge): self
    {
        $this->categorieAge = $categorieAge;

        return $this;
    }

    public function getGenreHomme(): ?bool
    {
        return $this->genreHomme;
    }

    public function setGenreHomme(bool $genreHomme): self
    {
        $this->genreHomme = $genreHomme;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebutInscription(): ?\DateTimeInterface
    {
        return $this->dateDebutInscription;
    }

    public function setDateDebutInscription(\DateTimeInterface $dateDebutInscription): self
    {
        $this->dateDebutInscription = $dateDebutInscription;

        return $this;
    }

    public function getDateFinInscription(): ?\DateTimeInterface
    {
        return $this->dateFinInscription;
    }

    public function setDateFinInscription(\DateTimeInterface $dateFinInscription): self
    {
        $this->dateFinInscription = $dateFinInscription;

        return $this;
    }

    public function getInscriptionManuelle(): ?bool
    {
        return $this->inscriptionManuelle;
    }

    public function setInscriptionManuelle(bool $inscriptionManuelle): self
    {
        $this->inscriptionManuelle = $inscriptionManuelle;

        return $this;
    }

    public function getNombrePlaces(): ?int
    {
        return $this->nombrePlaces;
    }

    public function setNombrePlaces(int $nombrePlaces): self
    {
        $this->nombrePlaces = $nombrePlaces;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(?string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getValidationInscriptions(): ?bool
    {
        return $this->validationInscriptions;
    }

    public function setValidationInscriptions(bool $validationInscriptions): self
    {
        $this->validationInscriptions = $validationInscriptions;

        return $this;
    }

    public function getNbSetsGagnants(): ?int
    {
        return $this->nbSetsGagnants;
    }

    public function setNbSetsGagnants(int $nbSetsGagnants): self
    {
        $this->nbSetsGagnants = $nbSetsGagnants;

        return $this;
    }
}
