<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PromptListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromptListRepository::class)]
#[ApiResource]
class PromptList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\OneToMany(targetEntity: Prompt::class, mappedBy: 'promptList', orphanRemoval: true)]
    private Collection $prompts;

    public function __construct()
    {
        $this->prompts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return Collection<int, Prompt>
     */
    public function getPrompts(): Collection
    {
        return $this->prompts;
    }

    public function addPrompt(Prompt $prompt): static
    {
        if (!$this->prompts->contains($prompt)) {
            $this->prompts->add($prompt);
            $prompt->setPromptList($this);
        }

        return $this;
    }

    public function removePrompt(Prompt $prompt): static
    {
        if ($this->prompts->removeElement($prompt)) {
            // set the owning side to null (unless already changed)
            if ($prompt->getPromptList() === $this) {
                $prompt->setPromptList(null);
            }
        }

        return $this;
    }
}
