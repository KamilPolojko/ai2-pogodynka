<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\LocationRepository;
use App\Repository\WeatherDataRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    #[Route('/weather/{name}/{country}',name: 'app_weather', requirements: ['countryCode' => '.{0,2}'], defaults: ['countryCode' => null])]
    public function city(string $name,?string $country, WeatherDataRepository $repository,LocationRepository $locationRepository): Response
    {

        $location = $locationRepository->findOneBy(['name' => $name, 'country' => $country]);

        if (!$location) {
            throw $this->createNotFoundException('No location found for city: ' . $name . ' in country: ' . $country);
        }

        $measurements = $repository->findByLocation($location);


        return $this->render('weather/city.html.twig', [
            'location' => $location,
            'measurements' => $measurements,
        ]);

    }
}
