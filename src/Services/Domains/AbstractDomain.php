<?php

namespace Czim\Simplicate\Services\Domains;

use Czim\Simplicate\Contracts\Services\SimplicateClientInterface;
use Czim\Simplicate\Contracts\Services\SimplicateDomainInterface;
use Czim\Simplicate\Services\FluentPassthruToClient;

abstract class AbstractDomain implements SimplicateDomainInterface
{
    use FluentPassthruToClient;


    /**
     * @var SimplicateClientInterface
     */
    protected $client;

    /**
     * @var null|string
     */
    protected $fluentEndpoint;


    public function __construct(SimplicateClientInterface $client)
    {
        $this->client = $client;
    }


    protected function getClient(): SimplicateClientInterface
    {
        return $this->client;
    }

    protected function prefixPath(string $path): string
    {
        return $this->path() . '/' . $path;
    }

}
