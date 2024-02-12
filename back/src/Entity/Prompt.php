<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Repository\PromptRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromptRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(),
        new Get(
            uriTemplate: '/prompts/nameFr/{nameFr}',
            uriVariables: 'nameFr',
        ),
        new Post()

    ],
    paginationEnabled: false
)]
#[ApiFilter(SearchFilter::class,
    properties: [
        'promptList.year' => 'exact',
        'nameFr' => 'exact',
        'nameEn' => 'exact'
    ])]
class Prompt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $day = null;

    #[ORM\Column(length: 255)]
    private ?string $nameFr = null;

    #[ORM\Column(length: 255)]
    private ?string $nameEn = null;

    #[ORM\ManyToOne(inversedBy: 'prompts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PromptList $promptList = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?int
    {
        return $this->day;
    }

    public function setDay(int $day): static
    {
        $this->day = $day;

        return $this;
    }

    public function getNameFr(): ?string
    {
        return $this->nameFr;
    }

    public function setNameFr(string $nameFr): static
    {
        $this->nameFr = $nameFr;

        return $this;
    }

    public function getNameEn(): ?string
    {
        return $this->nameEn;
    }

    public function setNameEn(string $nameEn): static
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    public function getPromptList(): ?PromptList
    {
        return $this->promptList;
    }

    public function setPromptList(?PromptList $promptList): static
    {
        $this->promptList = $promptList;

        return $this;
    }
}
