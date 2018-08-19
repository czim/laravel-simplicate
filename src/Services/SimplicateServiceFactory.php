<?php

namespace Czim\Simplicate\Services;

use Czim\Simplicate\Contracts\Services\SimplicateClientInterface;
use Czim\Simplicate\Contracts\Services\SimplicateServiceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class SimplicateServiceFactory
{

    public function make(): SimplicateServiceInterface
    {
        return new SimplicateService($this->makeSimplicateClient());
    }

    protected function makeSimplicateClient(): SimplicateClientInterface
    {
        return new SimplicateClient($this->makeGuzzleInstance());
    }

    protected function makeGuzzleInstance(): ClientInterface
    {
        return new Client($this->getDefaultGuzzleClientConfig());
    }

    protected function getDefaultGuzzleClientConfig(): array
    {
        return [
            'base_uri' => $this->getSimplicateBaseUrl(),
            'headers'  => [
                'Accept'                => '*/*',
                'Accept-Encoding'       => 'gzip, deflate',
                'Authentication-Key'    => config('simplicate.api.key'),
                'Authentication-Secret' => config('simplicate.api.secret'),
                'Content-Type'          => 'application/json',
            ],
        ];
    }

    protected function getSimplicateBaseUrl(): string
    {
        return str_replace(
            '{DOMAIN}',
            config('simplicate.api.domain'),
            config('simplicate.api.url')
        );
    }

}
