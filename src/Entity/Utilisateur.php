<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $niveau;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tournoi", mappedBy="utilisateur")
     */
    private $tournois;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Match", inversedBy="utilisateurs")
     */
    private $matchs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Set", mappedBy="utilisateur_gagnant")
     */
    private $sets_gagnes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Set", mappedBy="utilisateur_perdant")
     */
    private $sets_perdus;

    public function __construct()
    {
        $this->tournois = new ArrayCollection();
        $this->matchs = new ArrayCollection();
        $this->sets_gagnes = new ArrayCollection();
        $this->sets_perdus = new ArrayCollection();
    }

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * @return Collection|Tournoi[]
     */
    public function getTournois(): Collection
    {
        return $this->tournois;
    }

    public function addTournois(Tournoi $tournois): self
    {
        if (!$this->tournois->contains($tournois)) {
            $this->tournois[] = $tournois;
            $tournois->setUtilisateur($this);
        }

        return $this;
    }

    public function removeTournois(Tournoi $tournois): self
    {
        if ($this->tournois->contains($tournois)) {
            $this->tournois->removeElement($tournois);
            // set the owning side to null (unless already changed)
            if ($tournois->getUtilisateur() === $this) {
                $tournois->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Match[]
     */
    public function getMatchs(): Collection
    {
        return $this->matchs;
    }

    public function addMatch(Match $match): self
    {
        if (!$this->matchs->contains($match)) {
            $this->matchs[] = $match;
        }

        return $this;
    }

    public function removeMatch(Match $match): self
    {
        if ($this->matchs->contains($match)) {
            $this->matchs->removeElement($match);
        }

        return $this;
    }

    /**
     * @return Collection|Set[]
     */
    public function getSetsGagnes(): Collection
    {
        return $this->sets_gagnes;
    }

    public function addSetsGagne(Set $setsGagne): self
    {
        if (!$this->sets_gagnes->contains($setsGagne)) {
            $this->sets_gagnes[] = $setsGagne;
            $setsGagne->setUtilisateurGagnant($this);
        }

        return $this;
    }

    public function removeSetsGagne(Set $setsGagne): self
    {
        if ($this->sets_gagnes->contains($setsGagne)) {
            $this->sets_gagnes->removeElement($setsGagne);
            // set the owning side to null (unless already changed)
            if ($setsGagne->getUtilisateurGagnant() === $this) {
                $setsGagne->setUtilisateurGagnant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Set[]
     */
    public function getSetsPerdus(): Collection
    {
        return $this->sets_perdus;
    }

    public function addSetsPerdus(Set $setsPerdus): self
    {
        if (!$this->sets_perdus->contains($setsPerdus)) {
            $this->sets_perdus[] = $setsPerdus;
            $setsPerdus->setUtilisateurPerdant($this);
        }

        return $this;
    }

    public function removeSetsPerdus(Set $setsPerdus): self
    {
        if ($this->sets_perdus->contains($setsPerdus)) {
            $this->sets_perdus->removeElement($setsPerdus);
            // set the owning side to null (unless already changed)
            if ($setsPerdus->getUtilisateurPerdant() === $this) {
                $setsPerdus->setUtilisateurPerdant(null);
            }
        }

        return $this;
    }
}
