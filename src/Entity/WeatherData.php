<?php

namespace App\Entity;

use App\Repository\WeatherDataRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeatherDataRepository::class)]
class WeatherData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'weatherData')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $measurement_time = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $tempereature = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $humidity = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2, nullable: true)]
    private ?string $pressure = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $wind_speed = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $wind_direction = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $precipitation_type = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $precipitation_intensity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocationId(): ?Location
    {
        return $this->location_id;
    }

    public function setLocationId(?Location $location_id): static
    {
        $this->location_id = $location_id;

        return $this;
    }

    public function getMeasurementTime(): ?\DateTimeInterface
    {
        return $this->measurement_time;
    }

    public function setMeasurementTime(\DateTimeInterface $measurement_time): static
    {
        $this->measurement_time = $measurement_time;

        return $this;
    }

    public function getTempereature(): ?string
    {
        return $this->tempereature;
    }

    public function setTempereature(string $tempereature): static
    {
        $this->tempereature = $tempereature;

        return $this;
    }

    public function getHumidity(): ?string
    {
        return $this->humidity;
    }

    public function setHumidity(string $humidity): static
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getPressure(): ?string
    {
        return $this->pressure;
    }

    public function setPressure(?string $pressure): static
    {
        $this->pressure = $pressure;

        return $this;
    }

    public function getWindSpeed(): ?string
    {
        return $this->wind_speed;
    }

    public function setWindSpeed(?string $wind_speed): static
    {
        $this->wind_speed = $wind_speed;

        return $this;
    }

    public function getWindDirection(): ?string
    {
        return $this->wind_direction;
    }

    public function setWindDirection(?string $wind_direction): static
    {
        $this->wind_direction = $wind_direction;

        return $this;
    }

    public function getPrecipitationType(): ?string
    {
        return $this->precipitation_type;
    }

    public function setPrecipitationType(?string $precipitation_type): static
    {
        $this->precipitation_type = $precipitation_type;

        return $this;
    }

    public function getPrecipitationIntensity(): ?string
    {
        return $this->precipitation_intensity;
    }

    public function setPrecipitationIntensity(?string $precipitation_intensity): static
    {
        $this->precipitation_intensity = $precipitation_intensity;

        return $this;
    }
}
