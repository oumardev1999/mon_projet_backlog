<?php

namespace App\Entity;

use App\Repository\PartenairesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartenairesRepository::class)]
class Partenaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $statusEntreprise = null;

    #[ORM\Column]
    private ?bool $isperson = null;

    #[ORM\Column]
    private ?int $idpersonne = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusEntreprise(): ?string
    {
        return $this->statusEntreprise;
    }

    public function setStatusEntreprise(string $statusEntreprise): self
    {
        $this->statusEntreprise = $statusEntreprise;

        return $this;
    }

    public function isIsperson(): ?bool
    {
        return $this->isperson;
    }

    public function setIsperson(bool $isperson): self
    {
        $this->isperson = $isperson;

        return $this;
    }

    public function getIdpersonne(): ?int
    {
        return $this->idpersonne;
    }

    public function setIdpersonne(int $idpersonne): self
    {
        $this->idpersonne = $idpersonne;

        return $this;
    }
}
