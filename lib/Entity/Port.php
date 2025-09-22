<?php

declare(strict_types=1);

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: 'port')]
final class Port
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'string')]
    private string $country;

    /**
     * @param string $name
     * @param string $country
     */
    public function __construct(string $name, string $country)
    {
        $this->name = $name;
        $this->country = $country;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
