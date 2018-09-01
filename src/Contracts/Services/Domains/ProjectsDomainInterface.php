<?php

namespace Czim\Simplicate\Contracts\Services\Domains;

use Czim\Simplicate\Contracts\Services\SimplicateDomainInterface;
use Czim\Simplicate\Data\Responses\ServiceSingleResponse;
use Czim\Simplicate\Data\Responses\ServicesListResponse;

interface ProjectsDomainInterface extends SimplicateDomainInterface
{

    public function allServices(): ServicesListResponse;

    public function service(string $id): ServiceSingleResponse;

}
