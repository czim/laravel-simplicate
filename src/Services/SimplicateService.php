<?php

namespace Czim\Simplicate\Services;

use Czim\Simplicate\Contracts\Services\Domains;
use Czim\Simplicate\Contracts\Services\SimplicateClientInterface;
use Czim\Simplicate\Contracts\Services\SimplicateServiceInterface;
use Czim\Simplicate\Services\Domains\HoursDomain;
use Czim\Simplicate\Services\Domains\HrmDomain;

class SimplicateService implements SimplicateServiceInterface
{

    /**
     * @var SimplicateClientInterface
     */
    protected $client;

    /**
     * @var Domains\HoursDomainInterface
     */
    protected $hours;

    /**
     * @var Domains\HrmDomainInterface
     */
    protected $hrm;


    public function __construct(SimplicateClientInterface $client)
    {
        $this->client = $client;

        $this->hours = new HoursDomain($client);
        $this->hrm   = new HrmDomain($client);
    }


    public function setAuthentication(string $key, string $secret): SimplicateServiceInterface
    {
        $this->client->setAuthentication($key, $secret);

        return $this;
    }

    public function hours(): Domains\HoursDomainInterface
    {
        return $this->hours;
    }

    public function hrm(): Domains\HrmDomainInterface
    {
        return $this->hrm;
    }

}
