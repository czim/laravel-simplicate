<?php

namespace Czim\Simplicate\Services;

use Czim\Simplicate\Contracts\Services\Domains;
use Czim\Simplicate\Contracts\Services\SimplicateClientInterface;
use Czim\Simplicate\Contracts\Services\SimplicateServiceInterface;
use Czim\Simplicate\Services\Domains\HoursDomain;
use Czim\Simplicate\Services\Domains\HrmDomain;
use Czim\Simplicate\Services\Domains\ProjectsDomain;

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

    /**
     * @var Domains\ProjectsDomainInterface
     */
    protected $projects;


    public function __construct(SimplicateClientInterface $client)
    {
        $this->client = $client;

        $this->hours    = new HoursDomain($client);
        $this->hrm      = new HrmDomain($client);
        $this->projects = new ProjectsDomain($client);
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

    public function projects(): Domains\ProjectsDomainInterface
    {
        return $this->projects;
    }

}
