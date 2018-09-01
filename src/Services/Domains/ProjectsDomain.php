<?php

namespace Czim\Simplicate\Services\Domains;

use Czim\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Czim\Simplicate\Contracts\Services\Domains\ProjectsDomainInterface;
use Czim\Simplicate\Data\Responses\ServiceSingleResponse;
use Czim\Simplicate\Data\Responses\ServicesListResponse;

class ProjectsDomain extends AbstractDomain implements ProjectsDomainInterface
{

    /**
     * @return string
     */
    public function path(): string
    {
        return 'projects';
    }

    /**
     * @return SimplicateResponseInterface|ServicesListResponse
     */
    public function allServices(): ServicesListResponse
    {
        return $this->client->responseClass(ServicesListResponse::class)
            ->get($this->prefixPath('service'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|ServiceSingleResponse
     */
    public function service(string $id): ServiceSingleResponse
    {
        return $this->client->responseClass(ServiceSingleResponse::class)
            ->get($this->prefixPath('service/' . $id));
    }

}
