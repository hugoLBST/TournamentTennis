<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SetRepository")
 */
class Set
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbJeuDuGagnant;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbJeuDuPerdant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Match", inversedBy="sets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unMatch;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="sets_gagnes")
     */
    private $utilisateur_gagnant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="sets_perdus")
     */
    private $utilisateur_perdant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbJeuDuGagnant(): ?int
    {
        return $this->nbJeuDuGagnant;
    }

    public function setNbJeuDuGagnant(int $nbJeuDuGagnant): self
    {
        $this->nbJeuDuGagnant = $nbJeuDuGagnant;

        return $this;
    }

    public function getNbJeuDuPerdant(): ?int
    {
        return $this->nbJeuDuPerdant;
    }

    public function setNbJeuDuPerdant(int $nbJeuDuPerdant): self
    {
        $this->nbJeuDuPerdant = $nbJeuDuPerdant;

        return $this;
    }

    public function getUnMatch(): ?Match
    {
        return $this->unMatch;
    }

    public function setUnMatch(?Match $unMatch): self
    {
        $this->unMatch = $unMatch;

        return $this;
    }

    public function getUtilisateurGagnant(): ?Utilisateur
    {
        return $this->utilisateur_gagnant;
    }

    public function setUtilisateurGagnant(?Utilisateur $utilisateur_gagnant): self
    {
        $this->utilisateur_gagnant = $utilisateur_gagnant;

        return $this;
    }

    public function getUtilisateurPerdant(): ?Utilisateur
    {
        return $this->utilisateur_perdant;
    }

    public function setUtilisateurPerdant(?Utilisateur $utilisateur_perdant): self
    {
        $this->utilisateur_perdant = $utilisateur_perdant;

        return $this;
    }
}
