<?php

namespace Czim\Simplicate\Services\Domains;

use Czim\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Czim\Simplicate\Contracts\Services\Domains\HoursDomainInterface;
use Czim\Simplicate\Data\Responses\EmployeeSingleResponse;
use Czim\Simplicate\Data\Responses\HoursListResponse;
use Czim\Simplicate\Data\Responses\HoursSingleResponse;

class HoursDomain extends AbstractDomain implements HoursDomainInterface
{

    /**
     * @return string
     */
    public function path(): string
    {
        return 'hours';
    }

    /**
     * @return SimplicateResponseInterface|HoursListResponse
     */
    public function allHours(): HoursListResponse
    {
        return $this->client->responseClass(HoursListResponse::class)
            ->get($this->prefixPath('hours'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|HoursSingleResponse
     */
    public function hours(string $id): HoursSingleResponse
    {
        return $this->client->responseClass(EmployeeSingleResponse::class)
            ->get($this->prefixPath('hours/' . $id));
    }

}
