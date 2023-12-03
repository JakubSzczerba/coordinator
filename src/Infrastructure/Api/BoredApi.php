<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Infrastructure\Api;

class BoredApi
{
    private string $apiUrl;

    public function __construct(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    public function getActivity(string $type): array
    {
        $response = file_get_contents(
            $this->apiUrl . $type
        );

        return json_decode($response, true);
    }
}