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
    private $id;
    #[ORM\Column(type: 'string')]
    private $name;
    #[ORM\Column(type: 'float')]
    private $weaponPower;
    #[ORM\Column(type: 'float')]
    private $strength;
    #[ORM\Column(type: 'float')]
    private $jediFactor;
    #[ORM\Column(type: 'string')]
    private $team;
}
