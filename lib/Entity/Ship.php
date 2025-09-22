<?php

declare(strict_types=1);

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ship_doctrine')]
final class Ship
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\Column(type: 'float')]
    private float $weaponPower;
    #[ORM\Column(type: 'float')]
    private float $strength;
    #[ORM\Column(type: 'float')]
    private float $jediFactor;
    #[ORM\Column(type: 'string')]
    private string $team;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getWeaponPower(): float
    {
        return $this->weaponPower;
    }

    public function setWeaponPower(float $weaponPower): void
    {
        $this->weaponPower = $weaponPower;
    }

    public function getStrength(): float
    {
        return $this->strength;
    }

    public function setStrength(float $strength): void
    {
        $this->strength = $strength;
    }

    public function getJediFactor(): float
    {
        return $this->jediFactor;
    }

    public function setJediFactor(float $jediFactor): void
    {
        $this->jediFactor = $jediFactor;
    }

    public function getTeam(): string
    {
        return $this->team;
    }

    public function setTeam(string $team): void
    {
        $this->team = $team;
    }
}
