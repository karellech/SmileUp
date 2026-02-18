<?php

namespace App\Entity;

use App\Repository\RecommendationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'RECOMMENDATION')]
#[ORM\Entity(repositoryClass: RecommendationRepository::class)]
class Recommendation
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: 'recommendation_id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'recommendations')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'user_id', nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: Activity::class, inversedBy: 'recommendations')]
    #[ORM\JoinColumn(name: 'activity_id', referencedColumnName: 'activity_id', nullable: false)]
    private ?Activity $activity = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    private ?string $score = null;

    #[ORM\Column(name: 'generate_at', type: 'datetime')]
    private ?\DateTimeInterface $generateAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(string $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getGenerateAt(): ?\DateTimeInterface
    {
        return $this->generateAt;
    }

    public function setGenerateAt(\DateTimeInterface $generate_at): static
    {
        $this->generateAt = $generate_at;

        return $this;
    }

     public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;
        return $this;
    }

    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    public function setActivity(?Activity $activity): static
    {
        $this->activity = $activity;
        return $this;
    }
}
