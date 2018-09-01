<?php

namespace Czim\Simplicate\Contracts\Services;

interface SimplicateServiceInterface
{

    public function setAuthentication(string $key, string $secret): SimplicateServiceInterface;

    public function hours(): Domains\HoursDomainInterface;

    public function hrm(): Domains\HrmDomainInterface;

    public function projects(): Domains\ProjectsDomainInterface;

}
