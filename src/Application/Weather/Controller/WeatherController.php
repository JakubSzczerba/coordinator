<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Application\Weather\Controller;

use App\Application\Weather\Command\CheckWeatherCommand;
use App\Application\Weather\DTO\WeatherDTO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class WeatherController
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function checkWeather(Request $request): JsonResponse
    {
        $lat = $request->query->get('lat');
        $lon = $request->query->get('lon');

        if ($lat === null || $lon === null) {
            return new JsonResponse(['error' => 'Coordinates required'], 400);
        }

        try {
            $weatherDTO = new WeatherDTO(
                $lat,
                $lon
            );
            $command = new CheckWeatherCommand($weatherDTO);

            $envelope = $this->messageBus->dispatch($command);
            $handledStamp = $envelope->last(HandledStamp::class);

            return $handledStamp->getResult();
        } catch (\Exception $e) {

            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }
}