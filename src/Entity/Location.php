<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $country = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $region = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 8)]
    private ?string $latitude = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 11, scale: 8)]
    private ?string $longitude = null;

    #[ORM\OneToMany(targetEntity: WeatherData::class, mappedBy: 'location_id')]
    private Collection $weatherData;

    public function __construct()
    {
        $this->weatherData = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return Collection<int, WeatherData>
     */
    public function getWeatherData(): Collection
    {
        return $this->weatherData;
    }

    public function addWeatherData(WeatherData $weatherData): static
    {
        if (!$this->weatherData->contains($weatherData)) {
            $this->weatherData->add($weatherData);
            $weatherData->setLocationId($this);
        }

        return $this;
    }

    public function removeWeatherData(WeatherData $weatherData): static
    {
        if ($this->weatherData->removeElement($weatherData)) {
            // set the owning side to null (unless already changed)
            if ($weatherData->getLocationId() === $this) {
                $weatherData->setLocationId(null);
            }
        }

        return $this;
    }
}
