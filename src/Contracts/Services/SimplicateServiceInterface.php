<?php

namespace Czim\Simplicate\Contracts\Services;

interface SimplicateServiceInterface
{

    public function hours(): Domains\HoursDomainInterface;

    public function hrm(): Domains\HrmDomainInterface;

}
