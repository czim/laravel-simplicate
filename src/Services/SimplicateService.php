<?php

namespace Czim\Simplicate\Services;

use Czim\Simplicate\Contracts\Services\Domains;
use Czim\Simplicate\Contracts\Services\SimplicateClientInterface;
use Czim\Simplicate\Contracts\Services\SimplicateServiceInterface;
use Czim\Simplicate\Services\Domains\HrmDomain;

class SimplicateService implements SimplicateServiceInterface
{

    /**
     * @var SimplicateClientInterface
     */
    protected $client;

    /**
     * @var Domains\HrmDomainInterface
     */
    protected $hrm;


    public function __construct(SimplicateClientInterface $client)
    {
        $this->client = $client;

        $this->hrm = new HrmDomain($client);
    }


    public function hrm(): Domains\HrmDomainInterface
    {
        return $this->hrm;
    }

}
