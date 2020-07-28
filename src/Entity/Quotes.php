<?php

namespace App\Entity;

use App\Repository\QuotesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="1000")
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
    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param  string  $body
     * @return $this
     */
    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return Author|null
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    /**
     * @param  Author|null  $author
     * @return $this
     */
    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return QuoteType|null
     */
    public function getType(): ?QuoteType
    {
        return $this->type;
    }

    /**
     * @param  QuoteType|null  $type
     * @return $this
     */
    public function setType(?QuoteType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
