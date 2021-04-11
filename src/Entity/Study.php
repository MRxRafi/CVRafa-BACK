<?php

namespace App\Entity;

use App\Repository\StudyRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass=StudyRepository::class)
 */
class Study implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $degree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $place;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2)
     */
    private float $score;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private string $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $language;

    /**
     * Study constructor.
     * @param string $degree
     * @param string $place
     * @param float $score
     * @param string $date
     * @param string $language
     */
    public function __construct(string $degree, string $place, float $score, string $date, string $language) {
        $this->degree = $degree;
        $this->place = $place;
        $this->score = $score;
        $this->date = $date;
        $this->language = $language;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDegree(): ?string
    {
        return $this->degree;
    }

    public function setDegree(string $degree): self
    {
        $this->degree = $degree;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return array(
            'id' => $this->id,
            'degree' => $this->degree,
            'place' => $this->place,
            'score' => $this->score,
            'date' => $this->date,
            'language' => $this->language
        );
    }
}
