<?php

namespace Czim\Simplicate\Services\Domains;

use Czim\Simplicate\Contracts\Data\SimplicateResponseInterface;
use Czim\Simplicate\Contracts\Services\Domains\HoursDomainInterface;
use Czim\Simplicate\Data\Responses\HoursListResponse;
use Czim\Simplicate\Data\Responses\HoursSingleResponse;
use Czim\Simplicate\Data\Responses\HoursTypeListResponse;
use Czim\Simplicate\Data\Responses\HoursTypeSingleResponse;

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
        return $this->client->responseClass(HoursSingleResponse::class)
            ->get($this->prefixPath('hours/' . $id));
    }

    /**
     * @return SimplicateResponseInterface|HoursTypeListResponse
     */
    public function allHoursTypes(): HoursTypeListResponse
    {
        return $this->client->responseClass(HoursTypeListResponse::class)
            ->get($this->prefixPath('hourstype'));
    }

    /**
     * @param string $id
     * @return SimplicateResponseInterface|HoursTypeSingleResponse
     */
    public function hoursType(string $id): HoursTypeSingleResponse
    {
        return $this->client->responseClass(HoursTypeSingleResponse::class)
            ->get($this->prefixPath('hourstype/' . $id));
    }

}
