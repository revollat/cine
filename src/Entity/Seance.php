<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeanceRepository")
 */
class Seance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     * @Assert\NotBlank()
     */
    private $horaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Film", inversedBy="seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    public function getId()
    {
        return $this->id;
    }
    
    public function __toString()
    {
        return $this->getHoraire()->format('d/m/Y H:i');
    }

    public function getHoraire(): ?\DateTimeInterface
    {
        return $this->horaire;
    }

    public function setHoraire(\DateTimeInterface $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }
}
