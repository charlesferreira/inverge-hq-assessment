<?php

namespace App\Service;

use App\Models\DTO\ArtObject;
use App\Models\DTO\ArtObjectList;
use App\Models\DTO\DepartmentList;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class MetMuseumAPIServiceImpl implements MetMuseumAPIService
{
    /**
     * @var Client
     */
    private Client $httpClient;

    /**
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient) {
        $this->httpClient = $httpClient;
    }

    /**
     * @return ArtObjectList
     * @throws UnknownProperties|GuzzleException
     */
    public function objects(): ArtObjectList {
        return new ArtObjectList($this->fetch('/objects'));
    }

    /**
     * @param int $id
     * @return ArtObject
     * @throws UnknownProperties|GuzzleException
     */
    public function object(int $id): ArtObject {
        return new ArtObject($this->fetch('/objects/' . $id));
    }

    /**
     * @return DepartmentList
     * @throws UnknownProperties|GuzzleException
     */
    public function departments(): DepartmentList {
        return new DepartmentList($this->fetch('/departments'));
    }

    /**
     * @throws GuzzleException
     */
    private function fetch(string $endpoint): mixed {
        $uri = env('MET_MUSEUM_API_URL');
        $response = $this->httpClient->get($uri . $endpoint)->getBody();

        return json_decode($response, true);
    }
}