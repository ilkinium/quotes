<?php

namespace App\Entity;

use App\Repository\QuotesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuotesRepository::class)
 */
class Quotes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\ManyToOne(targetEntity=Author::class, inversedBy="quotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=QuoteType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getType(): ?QuoteType
    {
        return $this->type;
    }

    public function setType(?QuoteType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
