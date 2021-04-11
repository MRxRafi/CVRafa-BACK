<?php

namespace App\Entity;

use App\Repository\FrameworkRepository;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass=FrameworkRepository::class)
 */
class Framework implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=2)
     */
    private float $knowledge;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private float $experienceYears;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * Framework constructor.
     * @param float $knowledge
     * @param float $experienceYears
     * @param string $name
     */
    public function __construct(float $knowledge, float $experienceYears, string $name)
    {
        $this->knowledge = $knowledge;
        $this->experienceYears = $experienceYears;
        $this->name = $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKnowledge(): ?string
    {
        return $this->knowledge;
    }

    public function setKnowledge(string $knowledge): self
    {
        $this->knowledge = $knowledge;

        return $this;
    }

    public function getExperienceYears(): ?string
    {
        return $this->experienceYears;
    }

    public function setExperienceYears(string $experienceYears): self
    {
        $this->experienceYears = $experienceYears;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'knowledge' => $this->knowledge,
            'experienceYears' => $this->experienceYears
        );
    }
}
