<?php

declare(strict_types=1);

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: 'voyage')]
final class Voyage
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(type: 'date')]
    private string $departureDate;
    #[ORM\Column(type: 'date')]
    private string $arrivalDate;

    #[ORM\ManyToOne(targetEntity: Ship::class, inversedBy: 'voyages')]
    private Ship $ship;

    #[ORM\ManyToOne(targetEntity: Port::class, inversedBy: 'departures')]
    private Port $departurePort;

    #[ORM\ManyToOne(targetEntity: Port::class, inversedBy: 'arrivals')]
    private Port $arrivalPort;

    /**
     * @param string $departureDate
     * @param string $arrivalDate
     */
    public function __construct(string $departureDate, string $arrivalDate)
    {
        $this->departureDate = $departureDate;
        $this->arrivalDate = $arrivalDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDepartureDate(): string
    {
        return $this->departureDate;
    }

    public function getArrivalDate(): string
    {
        return $this->arrivalDate;
    }

    public function setDepartureDate(string $departureDate): void
    {
        $this->departureDate = $departureDate;
    }

    public function setArrivalDate(string $arrivalDate): void
    {
        $this->arrivalDate = $arrivalDate;
    }
}
