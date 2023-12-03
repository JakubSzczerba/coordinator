<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Application\Weather\CommandHandler;

use App\Application\Weather\Command\CheckWeatherCommand;
use App\Domain\Weather\Service\WeatherService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CheckWeatherHandler
{
    public WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function __invoke(CheckWeatherCommand $command): JsonResponse
    {
        $coordinates = $command->getWeatherDTO();
        $weatherCondition = $this->weatherService->checkIfRaining($coordinates->getLatitude(), $coordinates->getLongitude());

        if ($weatherCondition->isRaining()) {
            return new JsonResponse(['ok' => 'It is raining'], 200);
        }

        return new JsonResponse(['ok' => 'It is not raining'], 200);
    }
}