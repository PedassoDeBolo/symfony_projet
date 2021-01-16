<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $intitule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $competencesRequises;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $experienceRequise;

    /**
     * @ORM\ManyToOne(targetEntity=formation::class, inversedBy="stages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formation;

    /**
     * @ORM\ManyToOne(targetEntity=entreprise::class, inversedBy="stages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entreprise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

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

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getCompetencesRequises(): ?string
    {
        return $this->competencesRequises;
    }

    public function setCompetencesRequises(?string $competencesRequises): self
    {
        $this->competencesRequises = $competencesRequises;

        return $this;
    }

    public function getExperienceRequise(): ?string
    {
        return $this->experienceRequise;
    }

    public function setExperienceRequise(?string $experienceRequise): self
    {
        $this->experienceRequise = $experienceRequise;

        return $this;
    }

    public function getFormation(): ?formation
    {
        return $this->formation;
    }

    public function setFormation(?formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getEntreprise(): ?entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }
}
