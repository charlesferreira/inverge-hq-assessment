<?php

namespace App\Service;

use GuzzleHttp\Client;

class MetMuseumAPIServiceImpl implements MetMuseumAPIService
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient) {
        $this->httpClient = $httpClient;
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function objects(): array {
        $uri = env('MET_MUSEUM_API_URL') . '/objects';
        $response = $this->httpClient->get($uri);

        return (array)json_decode($response->getBody(), true);
    }
}