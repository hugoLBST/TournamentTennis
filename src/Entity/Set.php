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
}
